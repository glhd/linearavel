<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ApiKeyPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ApiKeyCreateResponse extends LinearResponse
{
	public function resolve(): ApiKeyPayload
	{
		return ApiKeyPayload::from($this->json('data.apiKeyCreate'));
	}
}
