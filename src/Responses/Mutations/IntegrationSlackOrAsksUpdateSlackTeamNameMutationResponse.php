<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationSlackWorkspaceNamePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationSlackOrAsksUpdateSlackTeamNameMutationResponse extends LinearResponse
{
	public function resolve(): IntegrationSlackWorkspaceNamePayload
	{
		return IntegrationSlackWorkspaceNamePayload::from($this->json('data.integrationSlackOrAsksUpdateSlackTeamName'));
	}
}
