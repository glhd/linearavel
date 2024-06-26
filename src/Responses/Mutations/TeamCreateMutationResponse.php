<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TeamPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamCreateMutationResponse extends LinearResponse
{
	public function resolve(): TeamPayload
	{
		return TeamPayload::from($this->json('data.teamCreate'));
	}
}
