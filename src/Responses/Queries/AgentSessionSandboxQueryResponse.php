<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CodingAgentSandboxPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class AgentSessionSandboxQueryResponse extends LinearResponse
{
	public function resolve(): ?CodingAgentSandboxPayload
	{
		$data = $this->json('data.agentSessionSandbox');
		
		return null === $data ? null : CodingAgentSandboxPayload::from($data);
	}
}
