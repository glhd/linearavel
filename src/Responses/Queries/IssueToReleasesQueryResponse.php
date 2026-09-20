<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueToReleaseConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueToReleasesQueryResponse extends LinearResponse
{
	public function resolve(): IssueToReleaseConnection
	{
		return IssueToReleaseConnection::from($this->json('data.issueToReleases'));
	}
}
