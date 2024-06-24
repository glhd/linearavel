<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ApiKeyConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ApiKeysResponse extends LinearResponse
{
	public function resolve(): ApiKeyConnection
	{
		return ApiKeyConnection::from($this->json('data.apiKeys'));
	}
}
