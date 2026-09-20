<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueReferenceInput */
class IssueReferenceInput
{
	public function __construct(public string $identifier, public string $commitSha)
	{
	}
}
