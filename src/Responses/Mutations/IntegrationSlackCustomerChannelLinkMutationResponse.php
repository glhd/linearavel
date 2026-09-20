<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\SuccessPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationSlackCustomerChannelLinkMutationResponse extends LinearResponse
{
	public function resolve(): SuccessPayload
	{
		return SuccessPayload::from($this->json('data.integrationSlackCustomerChannelLink'));
	}
}
