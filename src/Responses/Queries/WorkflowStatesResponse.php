<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\WorkflowStateConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class WorkflowStatesResponse extends LinearResponse
{
	public function resolve(): WorkflowStateConnection
	{
		return WorkflowStateConnection::from($this->json('data.workflowStates'));
	}
}
