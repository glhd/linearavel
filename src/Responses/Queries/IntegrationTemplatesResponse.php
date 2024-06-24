<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IntegrationTemplateConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationTemplatesResponse extends LinearResponse
{
	public function resolve(): IntegrationTemplateConnection
	{
		return IntegrationTemplateConnection::from($this->json('data.integrationTemplates'));
	}
}
