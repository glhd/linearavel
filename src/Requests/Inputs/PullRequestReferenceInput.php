<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/PullRequestReferenceInput */
class PullRequestReferenceInput
{
	public function __construct(public string $repositoryOwner, public string $repositoryName, public int $number)
	{
	}
}
