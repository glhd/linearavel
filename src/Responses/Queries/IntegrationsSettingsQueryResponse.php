<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IntegrationsSettings;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationsSettingsQueryResponse extends LinearResponse
{
	public function resolve(): IntegrationsSettings
	{
		return IntegrationsSettings::from($this->json('data.integrationsSettings'));
	}
}
