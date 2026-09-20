<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InheritanceEntityMapping */
class InheritanceEntityMappingInput
{
	public function __construct(public string $workflowStates, public ?string $issueLabels = null, public ?string $projectLabels = null, public ?string $projectStatuses = null)
	{
	}
}
