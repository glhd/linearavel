<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueSearchResponse extends LinearResponse
{
	public function resolve(): IssueConnection
	{
		return IssueConnection::from($this->json('data.issueSearch'));
	}
}
