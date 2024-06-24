<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CycleConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class CyclesResponse extends LinearResponse
{
	public function resolve(): CycleConnection
	{
		return CycleConnection::from($this->json('data.cycles'));
	}
}
