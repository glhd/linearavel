<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitHubRepoInput */
class GitHubRepoInput
{
	public function __construct(public float $id, public string $fullName, public ?bool $archived = null, public ?string $externalId = null, public ?string $description = null)
	{
	}
}
