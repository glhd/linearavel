<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IssueRelationUpdateInput
{
	function __construct(public ?string $type = null, public ?string $issueId = null, public ?string $relatedIssueId = null)
	{
	}
}
