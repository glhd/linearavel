<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueToReleasePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueToReleaseCreateMutationResponse extends LinearResponse
{
	public function resolve(): IssueToReleasePayload
	{
		return IssueToReleasePayload::from($this->json('data.issueToReleaseCreate'));
	}
}
