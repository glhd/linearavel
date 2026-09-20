<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AgentSessionConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentSessionsQueryResponse extends LinearResponse
{
	public function resolve(): AgentSessionConnection
	{
		return AgentSessionConnection::from($this->json('data.agentSessions'));
	}
}
