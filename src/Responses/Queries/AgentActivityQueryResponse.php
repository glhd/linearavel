<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AgentActivity;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentActivityQueryResponse extends LinearResponse
{
	public function resolve(): AgentActivity
	{
		return AgentActivity::from($this->json('data.agentActivity'));
	}
}
