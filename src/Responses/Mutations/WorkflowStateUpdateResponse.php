<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\WorkflowStatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class WorkflowStateUpdateResponse extends LinearResponse
{
	public function resolve(): WorkflowStatePayload
	{
		return WorkflowStatePayload::from($this->json('data.workflowStateUpdate'));
	}
}
