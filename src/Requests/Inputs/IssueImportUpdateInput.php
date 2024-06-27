<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueImportUpdateInput */
class IssueImportUpdateInput
{
	public function __construct(public string $mapping)
	{
	}
}
