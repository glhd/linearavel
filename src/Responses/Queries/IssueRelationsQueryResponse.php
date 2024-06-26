<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueRelationConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueRelationsQueryResponse extends LinearResponse
{
	public function resolve(): IssueRelationConnection
	{
		return IssueRelationConnection::from($this->json('data.issueRelations'));
	}
}
