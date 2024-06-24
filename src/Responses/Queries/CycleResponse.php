<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Cycle;
use Glhd\Linearavel\Responses\LinearResponse;

class CycleResponse extends LinearResponse
{
	public function resolve(): Cycle
	{
		return Cycle::from($this->json('data.cycle'));
	}
}
