<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationDatadogEnvironmentsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationDatadogEnvironmentsMutationResponse extends LinearResponse
{
	public function resolve(): IntegrationDatadogEnvironmentsPayload
	{
		return IntegrationDatadogEnvironmentsPayload::from($this->json('data.integrationDatadogEnvironments'));
	}
}
