<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\IssueRelationType;

class IssueRelationCreateInput
{
	public function __construct(public IssueRelationType $type, public string $issueId, public string $relatedIssueId, public ?string $id = null)
	{
	}
}
