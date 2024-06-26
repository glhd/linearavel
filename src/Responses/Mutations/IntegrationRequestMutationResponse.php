<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationRequestPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationRequestMutationResponse extends LinearResponse
{
	public function resolve(): IntegrationRequestPayload
	{
		return IntegrationRequestPayload::from($this->json('data.integrationRequest'));
	}
}
