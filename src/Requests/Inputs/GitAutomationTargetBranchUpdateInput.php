<?php

namespace Glhd\Linearavel\Requests\Inputs;

class GitAutomationTargetBranchUpdateInput
{
	public function __construct(public ?string $branchPattern = null, public ?bool $isRegex = null)
	{
	}
}
