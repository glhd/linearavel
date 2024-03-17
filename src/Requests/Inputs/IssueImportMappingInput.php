<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IssueImportMappingInput
{
	public function __construct(public ?string $users = null, public ?string $workflowStates = null, public ?string $epics = null)
	{
	}
}
