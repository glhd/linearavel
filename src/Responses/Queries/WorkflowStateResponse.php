<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\WorkflowState;
use Glhd\Linearavel\Responses\LinearResponse;

class WorkflowStateResponse extends LinearResponse
{
	public function resolve(): WorkflowState
	{
		return WorkflowState::from($this->json('data.workflowState'));
	}
}
