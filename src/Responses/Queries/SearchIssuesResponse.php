<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueSearchPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class SearchIssuesResponse extends LinearResponse
{
	public function resolve(): IssueSearchPayload
	{
		return IssueSearchPayload::from($this->json('data.searchIssues'));
	}
}
