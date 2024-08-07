<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Issue;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueQueryResponse extends LinearResponse
{
	public function resolve(): Issue
	{
		return Issue::from($this->json('data.issue'));
	}
}
