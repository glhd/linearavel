<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\SlackChannelConnectPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationSlackProjectPostResponse extends LinearResponse
{
	public function resolve(): SlackChannelConnectPayload
	{
		return SlackChannelConnectPayload::from($this->json('data.integrationSlackProjectPost'));
	}
}
