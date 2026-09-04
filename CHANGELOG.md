# Changelog

All notable changes will be documented in this file following the [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) 
format. This project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

-   GraphQL variables for every query and mutation argument, so enums, dates, lists and nested input objects are sent correctly.
-   `LinearRequestException`, thrown when Linear reports GraphQL errors (which arrive with a `200` status code).
-   Support for GraphQL union types: each union becomes an interface that its member types implement, and responses resolve to the member named by `__typename`.
-   A daily workflow that rebuilds the package from the live Linear schema and tags a release when the schema changes.
-   `composer fetch-schema` to pull the live schema, and `linear:next-version` to work out the release that follows a schema change.
-   `.gitattributes`, so tests, the workbench and the schema are left out of the distributed package.

### Changed

-   Pending requests are now namespaced by kind, e.g. `Requests\Pending\Queries\PendingIssuesQueryRequest`.
-   Requires PHP 8.2+, Laravel 11+ and `spatie/laravel-data` 4.11+.
-   `LinearResponse::resolve()` returns `object` rather than `Data|Collection`, so union responses can narrow it to their interface.

### Fixed

-   List arguments were written as GraphQL objects (`ids: {0: "a"}`) instead of lists.
-   Enum arguments were written as objects instead of bare GraphQL enum names.
-   Date arguments were written as a dump of the `DateTime` internals.
-   `false`, `0` and `''` were silently dropped from input objects.
-   `GithubRepo` and `GitHubRepo` collided, because PHP class names are case-insensitive. The second is now generated as `GithubRepo2`.
-   Scalar list properties failed to hydrate under `spatie/laravel-data` 4.3 and newer.
-   Input classes were generated with a name that did not match their file, and relied on PHP CS Fixer to rename them.
-   `organizationInviteDetails` referred to a class that did not exist.

### Removed

-   `Glhd\Linearavel\Support\Client`, superseded by the Saloon connector.

## [0.0.3] - 2024-06-26

## [0.0.2] - 2024-06-25

## [0.0.1] - 2024-03-18

## [0.0.1]

# Keep a Changelog Syntax

-   `Added` for new features.
-   `Changed` for changes in existing functionality.
-   `Deprecated` for soon-to-be removed features.
-   `Removed` for now removed features.
-   `Fixed` for any bug fixes. 
-   `Security` in case of vulnerabilities.

[Unreleased]: https://github.com/glhd/linearavel/compare/0.0.3...HEAD

[0.0.3]: https://github.com/glhd/linearavel/compare/0.0.2...0.0.3

[0.0.2]: https://github.com/glhd/linearavel/compare/0.0.1...0.0.2

[0.0.1]: https://github.com/glhd/linearavel/compare/0.0.1...0.0.1

[0.0.1]: https://github.com/glhd/linearavel/compare/0.0.1...0.0.1
