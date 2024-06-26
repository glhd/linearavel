<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class RefreshGoogleSheetsDataMutationResponse extends LinearResponse
{
	public function resolve(): IntegrationPayload
	{
		return IntegrationPayload::from($this->json('data.refreshGoogleSheetsData'));
	}
}
