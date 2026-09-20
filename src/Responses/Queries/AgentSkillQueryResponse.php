<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AgentSkill;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentSkillQueryResponse extends LinearResponse
{
	public function resolve(): AgentSkill
	{
		return AgentSkill::from($this->json('data.agentSkill'));
	}
}
