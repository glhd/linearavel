<?php

namespace Glhd\Linearavel\Requests\Inputs;

class GitAutomationTargetBranchCreateInput
{
	public function __construct(public string $teamId, public string $branchPattern, public ?string $id = null, public ?bool $isRegex = null)
	{
	}
}
