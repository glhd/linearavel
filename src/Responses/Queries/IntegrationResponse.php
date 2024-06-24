<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Integration;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationResponse extends LinearResponse
{
	public function resolve(): Integration
	{
		return Integration::from($this->json('data.integration'));
	}
}
