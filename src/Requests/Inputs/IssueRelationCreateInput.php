<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\IssueRelationType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueRelationCreateInput */
class IssueRelationCreateInput
{
	public function __construct(public IssueRelationType $type, public string $issueId, public string $relatedIssueId, public ?string $id = null)
	{
	}
}
