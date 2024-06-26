<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueRelation;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueRelationQueryResponse extends LinearResponse
{
	public function resolve(): IssueRelation
	{
		return IssueRelation::from($this->json('data.issueRelation'));
	}
}
