<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitAutomationTargetBranchCreateInput */
class GitAutomationTargetBranchCreateInput
{
	public function __construct(public string $teamId, public string $branchPattern, public ?string $id = null, public ?bool $isRegex = null)
	{
	}
}
