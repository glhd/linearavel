<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\GitAutomationStates;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitAutomationStateUpdateInput */
class GitAutomationStateUpdateInput
{
	public function __construct(public ?string $stateId = null, public ?string $branchPattern = null, public ?string $targetBranchId = null, public ?GitAutomationStates $event = null)
	{
	}
}
