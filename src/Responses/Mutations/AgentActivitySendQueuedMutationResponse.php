<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AgentActivityPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentActivitySendQueuedMutationResponse extends LinearResponse
{
	public function resolve(): AgentActivityPayload
	{
		return AgentActivityPayload::from($this->json('data.agentActivitySendQueued'));
	}
}
