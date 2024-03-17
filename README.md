<div style="float: right;">
	<a href="https://github.com/glhd/linearavel/actions" target="_blank">
		<img 
			src="https://github.com/glhd/linearavel/workflows/PHPUnit/badge.svg" 
			alt="Build Status" 
		/>
	</a>
	<a href="https://codeclimate.com/github/glhd/linearavel/test_coverage" target="_blank">
		<img 
			src="https://api.codeclimate.com/v1/badges/change-me/test_coverage" 
			alt="Coverage Status" 
		/>
	</a>
	<a href="https://packagist.org/packages/glhd/linearavel" target="_blank">
        <img 
            src="https://poser.pugx.org/glhd/linearavel/v/stable" 
            alt="Latest Stable Release" 
        />
	</a>
	<a href="./LICENSE" target="_blank">
        <img 
            src="https://poser.pugx.org/glhd/linearavel/license" 
            alt="MIT Licensed" 
        />
    </a>
    <a href="https://twitter.com/inxilpro" target="_blank">
        <img 
            src="https://img.shields.io/twitter/follow/inxilpro?style=social" 
            alt="Follow @inxilpro on Twitter" 
        />
    </a>
</div>

# Linearavel

Linearavel is a fully-featured Linear SDK for PHP and Laravel.

## Installation

```shell
composer require glhd/linearavel
```

## Usage

Linear uses GraphQL which tends not to be particularly compatible with how PHP
applications interact with APIs. This package attempts to bridge that gap—making
API calls feel fluent but still exposing all the power of the Linear API.

A typical API call will look something like:

```php
$viewer = Linear::viewer() // "viewer" is the name of the GraphQL query
    ->with('organization', 'id', 'name') // `with` lets you quickly retrieve nested fields
    ->get('id', 'name', 'active', 'avatarUrl', 'timezone'); // `get` defines the fields to retrieve
```

Each call returns a `LinearResponse`—a custom [Saloon](https://docs.saloon.dev/) object that exposes
things like `status()` and `headers()` as well as letting you `resolve()` the response into a
fully-typed Linear data object.

```php
$user = $viewer->resolve();
assert($user instanceof Glhd\Linearavel\Data\User);
assert($user->name === 'Chris Morrell');
assert($user->organization instanceof Glhd\Linearavel\Data\Organization);
assert($user->organization->name === 'InterNACHI');
```
