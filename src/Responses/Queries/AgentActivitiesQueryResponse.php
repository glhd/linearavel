<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AgentActivityConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentActivitiesQueryResponse extends LinearResponse
{
	public function resolve(): AgentActivityConnection
	{
		return AgentActivityConnection::from($this->json('data.agentActivities'));
	}
}
