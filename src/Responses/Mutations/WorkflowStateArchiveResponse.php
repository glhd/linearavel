<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\WorkflowStateArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class WorkflowStateArchiveResponse extends LinearResponse
{
	public function resolve(): WorkflowStateArchivePayload
	{
		return WorkflowStateArchivePayload::from($this->json('data.workflowStateArchive'));
	}
}
