<?php

namespace Glhd\Linearavel\Requests\Inputs;

class WorkflowCondition
{
	function __construct(public ?IssueFilter $issueFilter = null, public ?ProjectFilter $projectFilter = null)
	{
	}
}
