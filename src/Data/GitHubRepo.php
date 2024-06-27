<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GithubRepo */
class GitHubRepo extends Data
{
	public function __construct(public Optional|string $id, public Optional|string $name)
	{
	}
}
