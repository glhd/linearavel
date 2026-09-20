<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Responses\LinearResponse;

class AgentSessionSshAddressQueryResponse extends LinearResponse
{
	public function resolve(): ?string
	{
		return $this->json('data.agentSessionSshAddress');
	}
}
