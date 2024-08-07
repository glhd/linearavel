<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\GitAutomationStates;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitAutomationStateCreateInput */
class GitAutomationStateCreateInput
{
	public function __construct(
		public string $teamId,
		public GitAutomationStates $event,
		public ?string $id = null,
		public ?string $stateId = null,
		public ?string $branchPattern = null,
		public ?string $targetBranchId = null
	) {
	}
}
