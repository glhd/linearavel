<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueSubscribeResponse extends LinearResponse
{
	public function resolve(): IssuePayload
	{
		return IssuePayload::from($this->json('data.issueSubscribe'));
	}
}
