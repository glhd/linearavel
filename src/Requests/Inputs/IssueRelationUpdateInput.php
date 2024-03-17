<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IssueRelationUpdateInput
{
	public function __construct(public ?string $type = null, public ?string $issueId = null, public ?string $relatedIssueId = null)
	{
	}
}
