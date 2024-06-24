<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class IssuesResponse extends LinearResponse
{
	public function resolve(): IssueConnection
	{
		return IssueConnection::from($this->json('data.issues'));
	}
}