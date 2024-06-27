<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueRelationUpdateInput */
class IssueRelationUpdateInput
{
	public function __construct(public ?string $type = null, public ?string $issueId = null, public ?string $relatedIssueId = null)
	{
	}
}
