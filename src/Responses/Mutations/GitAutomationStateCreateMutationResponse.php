<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\GitAutomationStatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class GitAutomationStateCreateMutationResponse extends LinearResponse
{
	public function resolve(): GitAutomationStatePayload
	{
		return GitAutomationStatePayload::from($this->json('data.gitAutomationStateCreate'));
	}
}
