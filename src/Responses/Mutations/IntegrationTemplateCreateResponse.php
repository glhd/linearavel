<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationTemplatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationTemplateCreateResponse extends LinearResponse
{
	public function resolve(): IntegrationTemplatePayload
	{
		return IntegrationTemplatePayload::from($this->json('data.integrationTemplateCreate'));
	}
}
