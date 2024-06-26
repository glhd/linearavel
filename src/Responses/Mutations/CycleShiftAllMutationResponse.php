<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CyclePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CycleShiftAllMutationResponse extends LinearResponse
{
	public function resolve(): CyclePayload
	{
		return CyclePayload::from($this->json('data.cycleShiftAll'));
	}
}
