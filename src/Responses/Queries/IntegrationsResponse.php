<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IntegrationConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationsResponse extends LinearResponse
{
	public function resolve(): IntegrationConnection
	{
		return IntegrationConnection::from($this->json('data.integrations'));
	}
}
