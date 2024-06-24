<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AsksChannelConnectPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationAsksConnectChannelResponse extends LinearResponse
{
	public function resolve(): AsksChannelConnectPayload
	{
		return AsksChannelConnectPayload::from($this->json('data.integrationAsksConnectChannel'));
	}
}
