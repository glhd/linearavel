<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueToRelease;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueToReleaseQueryResponse extends LinearResponse
{
	public function resolve(): IssueToRelease
	{
		return IssueToRelease::from($this->json('data.issueToRelease'));
	}
}
