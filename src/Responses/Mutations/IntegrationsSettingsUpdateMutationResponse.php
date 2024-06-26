<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationsSettingsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationsSettingsUpdateMutationResponse extends LinearResponse
{
	public function resolve(): IntegrationsSettingsPayload
	{
		return IntegrationsSettingsPayload::from($this->json('data.integrationsSettingsUpdate'));
	}
}
