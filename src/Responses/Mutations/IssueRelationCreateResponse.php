<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueRelationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueRelationCreateResponse extends LinearResponse
{
	public function resolve(): IssueRelationPayload
	{
		return IssueRelationPayload::from($this->json('data.issueRelationCreate'));
	}
}
