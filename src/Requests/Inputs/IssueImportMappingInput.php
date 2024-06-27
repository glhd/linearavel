<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueImportMappingInput */
class IssueImportMappingInput
{
	public function __construct(public ?string $users = null, public ?string $workflowStates = null, public ?string $epics = null)
	{
	}
}
