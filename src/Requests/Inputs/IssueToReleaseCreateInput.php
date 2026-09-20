<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueToReleaseCreateInput */
class IssueToReleaseCreateInput
{
	public function __construct(public string $issueId, public string $releaseId, public ?string $id = null)
	{
	}
}
