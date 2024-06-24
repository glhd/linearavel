<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\GitAutomationTargetBranchPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class GitAutomationTargetBranchUpdateResponse extends LinearResponse
{
	public function resolve(): GitAutomationTargetBranchPayload
	{
		return GitAutomationTargetBranchPayload::from($this->json('data.gitAutomationTargetBranchUpdate'));
	}
}
