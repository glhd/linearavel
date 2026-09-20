<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeUpdateArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeUpdateUnarchiveMutationResponse extends LinearResponse
{
	public function resolve(): InitiativeUpdateArchivePayload
	{
		return InitiativeUpdateArchivePayload::from($this->json('data.initiativeUpdateUnarchive'));
	}
}
