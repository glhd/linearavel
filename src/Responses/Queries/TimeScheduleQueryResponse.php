<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\TimeSchedule;
use Glhd\Linearavel\Responses\LinearResponse;

class TimeScheduleQueryResponse extends LinearResponse
{
	public function resolve(): TimeSchedule
	{
		return TimeSchedule::from($this->json('data.timeSchedule'));
	}
}
