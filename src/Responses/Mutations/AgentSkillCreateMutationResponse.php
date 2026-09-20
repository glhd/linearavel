<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AgentSkillPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentSkillCreateMutationResponse extends LinearResponse
{
	public function resolve(): AgentSkillPayload
	{
		return AgentSkillPayload::from($this->json('data.agentSkillCreate'));
	}
}
