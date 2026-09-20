<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AgentSessionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentSessionUpdateExternalUrlMutationResponse extends LinearResponse
{
	public function resolve(): AgentSessionPayload
	{
		return AgentSessionPayload::from($this->json('data.agentSessionUpdateExternalUrl'));
	}
}
