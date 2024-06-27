<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitAutomationTargetBranchUpdateInput */
class GitAutomationTargetBranchUpdateInput
{
	public function __construct(public ?string $branchPattern = null, public ?bool $isRegex = null)
	{
	}
}
