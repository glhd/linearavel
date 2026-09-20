# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

`glhd/linearavel` is a Laravel package: a fully-typed Linear API SDK. **The vast majority of `src/` is generated code**, produced by walking Linear's GraphQL schema (`local.graphql`) and building a PHP syntax tree with `nikic/php-parser`. Never hand-edit generated files — change the generator and regenerate.

Generated (do not edit by hand):
- `src/Data/` — `spatie/laravel-data` objects, plus `Data/Enums` and `Data/Contracts` (interfaces for GraphQL interfaces *and* unions)
- `src/Requests/Inputs/`, `src/Requests/Pending/{Queries,Mutations}/`
- `src/Responses/{Queries,Mutations}/`
- `src/Connectors/QueriesLinear.php`, `src/Connectors/MutatesLinear.php` — the typed method-per-query/mutation traits on the connector
- `.phpstorm.meta.php`

Hand-written (the actual source of the package):
- `src/Support/CodeGeneration/` — the generator (see below)
- `src/Support/GraphQueryBuilder.php`, `GraphValue.php`, `KeyHelper.php`, `helpers.php`, `LinearavelServiceProvider.php`
- `src/Connectors/LinearConnector.php`, `src/Requests/{LinearRequest,PendingLinearRequest}.php`, `src/Responses/LinearResponse.php`, `src/Exceptions/`, `src/Facades/`
- A hand-written class in a generated namespace survives regeneration if it implements `Glhd\Linearavel\Contracts\SkipsCodeGeneration`.

## Commands

Dev commands run through Testbench (`vendor/bin/testbench`); the Artisan commands themselves are defined in `workbench/routes/console.php`, not in `src/`, so they ship only to developers.

```shell
composer test                        # vendor/bin/phpunit
vendor/bin/phpunit --filter test_it_can_fetch_issues
vendor/bin/phpunit tests/Feature/GraphQueryBuilderTest.php

composer lint                        # php-cs-fixer --diff --dry-run
composer fix-style                   # php-cs-fixer fix

composer fetch-schema                # testbench linear:schema — rewrites local.graphql, reports the version bump
php vendor/bin/testbench linear:schema --dry-run   # report drift without writing
composer generate-data               # testbench generate:data — regenerate src/ from local.graphql
php vendor/bin/testbench reset:data  # delete all generated files first
```

Full rebuild, matching what CI does — note `generate:data` runs **twice** with a `dump-autoload` between, because default-field resolution loads generated classes off disk and can't see types that didn't exist on the first pass:

```shell
php vendor/bin/testbench reset:data
php vendor/bin/testbench generate:data
composer dump-autoload
php vendor/bin/testbench generate:data
vendor/bin/php-cs-fixer fix --quiet
composer dump-autoload
```

`.github/workflows/sync-schema.yml` runs this daily and tags a release when the schema moved. Version policy (`linear:next-version`): removed/narrowed schema types are a `minor` bump, additions are `patch` — below 1.0, a breaking change moves the minor rather than the major.

## Architecture

**Request flow.** `linear()` / `Linear::` resolves the singleton `LinearConnector` (a Saloon connector). Its generated traits give one method per GraphQL operation (`viewer()`, `issues(filter:, first:)`, `issueCreateMutation(...)`), each returning a `Pending*Request` extending `PendingLinearRequest`. The pending request holds a `GraphQueryBuilder`; calling `->get(...$fields)` or `->response(...$fields)` builds the query, sends a `LinearRequest`, and hands back a generated `*Response` (extending `LinearResponse`) whose `resolve()` hydrates the typed `Data` object.

**Field selection.** Each pending request carries `DEFAULT_ATTRIBUTES` (the scalar fields of its return type, computed at generation time by `KeyHelper`). `get()` with no args, or `'*'`, expands to those; `with('organization', 'id', 'name')` adds dotted nested fields. `'*'` is not allowed in a nested position.

**Arguments.** `ARGUMENT_TYPES` on each pending request maps argument name to GraphQL type (e.g. `'id' => 'String!'`). Typed arguments are sent as GraphQL **variables**; untyped ones are inlined as literals into the query string. This is what makes enums, dates, lists and nested inputs serialize correctly — see `GraphValue` and `GraphQueryBuilderTest`.

**Unions.** A GraphQL union becomes an interface in `Data/Contracts` implemented by every member; querying one uses inline fragments (`GraphQueryBuilder::fragment('Issue').'.id'`, since dot-separated field keys can't express `... on Type`), and resolution dispatches on `__typename`.

**Errors.** Linear returns GraphQL errors with HTTP 200, so `LinearConnector::hasRequestFailed()` inspects the body and throws `LinearRequestException` (`messages()`, `codes()`, `errors()`).

**The generator.** `Transformer` parses `local.graphql` and dispatches each definition node to a `*Transformer` (`TypeTransformer`, `InputTransformer`, `EnumTransformer`, `UnionTransformer`, `QueryTransformer`, `MutationTransformer`, …) that emits php-parser nodes into a `WriteQueue`. Two things are easy to break:
- **Ordering matters.** Nodes are sorted by `Transformer::order()` — contracts/unions, then enums, then inputs, then objects, then the `Query`/`Mutation` connector traits — because generated code is loaded back in as generation proceeds.
- **PHP class names are case-insensitive.** `Taxonomy::resolveCollisions()` runs over every definition up front and aliases types that differ only by case (e.g. `GitHubRepo` vs `GithubRepo`) within a namespace group. All PHP naming decisions live in `Taxonomy`.

## Tests

PHPUnit (not Pest), `tests/Feature/`, classic `test_snake_case` method names, all extending `Glhd\Linearavel\Tests\TestCase` (Orchestra Testbench). HTTP is faked with Saloon's `MockClient::global()` plus recorded fixtures in `tests/Fixtures/`, which redact emails, UUIDs and long tokens via `Fixture::defineSensitiveRegexPatterns()`. `assertSaloonSent()` on the base test case is the usual way to assert on the emitted query string.

`GeneratedCodeTest` and `SchemaFetcherTest` are the guardrails on generated output: every class loads, no class references a missing type, every schema type has a class, no two files differ only by case, and the committed `local.graphql` round-trips through introspection.

## Style

PHP CS Fixer with a custom ruleset (`.php-cs-fixer.dist.php`): **tabs for indentation**, `fn($x)` / `function()` with no space before the paren, alphabetically ordered imports, no space before a return-type colon, no spaces around `.` concatenation. Run `composer fix-style` before committing; CI fails on a dirty diff.
