<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationDeleteResponse extends LinearResponse
{
	public function resolve(): DeletePayload
	{
		return DeletePayload::from($this->json('data.integrationDelete'));
	}
}
