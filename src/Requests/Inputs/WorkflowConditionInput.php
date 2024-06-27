<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/WorkflowCondition */
class WorkflowConditionInput
{
	public function __construct(public ?IssueFilterInput $issueFilter = null, public ?ProjectFilterInput $projectFilter = null)
	{
	}
}
