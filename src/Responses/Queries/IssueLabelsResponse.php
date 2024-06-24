<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueLabelConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueLabelsResponse extends LinearResponse
{
	public function resolve(): IssueLabelConnection
	{
		return IssueLabelConnection::from($this->json('data.issueLabels'));
	}
}
