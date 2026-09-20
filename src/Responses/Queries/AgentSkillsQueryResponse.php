<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AgentSkillConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentSkillsQueryResponse extends LinearResponse
{
	public function resolve(): AgentSkillConnection
	{
		return AgentSkillConnection::from($this->json('data.agentSkills'));
	}
}
