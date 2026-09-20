<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AgentSession;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentSessionQueryResponse extends LinearResponse
{
	public function resolve(): AgentSession
	{
		return AgentSession::from($this->json('data.agentSession'));
	}
}
