<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\MicrosoftTeamsChannelsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class MicrosoftTeamsChannelsQueryResponse extends LinearResponse
{
	public function resolve(): MicrosoftTeamsChannelsPayload
	{
		return MicrosoftTeamsChannelsPayload::from($this->json('data.microsoftTeamsChannels'));
	}
}
