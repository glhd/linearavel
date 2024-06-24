<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TimeSchedulePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TimeScheduleRefreshIntegrationScheduleResponse extends LinearResponse
{
	public function resolve(): TimeSchedulePayload
	{
		return TimeSchedulePayload::from($this->json('data.timeScheduleRefreshIntegrationSchedule'));
	}
}
