<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\TimeScheduleConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class TimeSchedulesQueryResponse extends LinearResponse
{
	public function resolve(): TimeScheduleConnection
	{
		return TimeScheduleConnection::from($this->json('data.timeSchedules'));
	}
}
