<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\UsageAlertConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class UsageAlertsQueryResponse extends LinearResponse
{
	public function resolve(): UsageAlertConnection
	{
		return UsageAlertConnection::from($this->json('data.usageAlerts'));
	}
}
