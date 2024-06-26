<?php

namespace Glhd\Linearavel\Requests\Inputs;

class WorkflowConditionInput
{
	public function __construct(public ?IssueFilterInput $issueFilter = null, public ?ProjectFilterInput $projectFilter = null)
	{
	}
}
