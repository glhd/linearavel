<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Cycle;
use Glhd\Linearavel\Responses\LinearResponse;

class CycleQueryResponse extends LinearResponse
{
	public function resolve(): Cycle
	{
		return Cycle::from($this->json('data.cycle'));
	}
}
