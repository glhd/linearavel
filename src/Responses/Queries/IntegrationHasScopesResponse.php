<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IntegrationHasScopesPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationHasScopesResponse extends LinearResponse
{
	public function resolve(): IntegrationHasScopesPayload
	{
		return IntegrationHasScopesPayload::from($this->json('data.integrationHasScopes'));
	}
}
