<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TeamArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamUnarchiveResponse extends LinearResponse
{
	public function resolve(): TeamArchivePayload
	{
		return TeamArchivePayload::from($this->json('data.teamUnarchive'));
	}
}
