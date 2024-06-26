<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TeamPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamUpdateMutationResponse extends LinearResponse
{
	public function resolve(): TeamPayload
	{
		return TeamPayload::from($this->json('data.teamUpdate'));
	}
}
