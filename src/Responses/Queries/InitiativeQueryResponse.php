<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Initiative;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeQueryResponse extends LinearResponse
{
	public function resolve(): Initiative
	{
		return Initiative::from($this->json('data.initiative'));
	}
}
