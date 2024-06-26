<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationSlackMutationResponse extends LinearResponse
{
	public function resolve(): IntegrationPayload
	{
		return IntegrationPayload::from($this->json('data.integrationSlack'));
	}
}
