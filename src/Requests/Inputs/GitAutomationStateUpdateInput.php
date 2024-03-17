<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\GitAutomationStates;

class GitAutomationStateUpdateInput
{
	function __construct(public ?string $stateId = null, public ?string $branchPattern = null, public ?string $targetBranchId = null, public ?GitAutomationStates $event = null)
	{
	}
}
