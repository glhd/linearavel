<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IntegrationTemplate;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationTemplateQueryResponse extends LinearResponse
{
	public function resolve(): IntegrationTemplate
	{
		return IntegrationTemplate::from($this->json('data.integrationTemplate'));
	}
}
