<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\UsageAlert;
use Glhd\Linearavel\Responses\LinearResponse;

class UsageAlertQueryResponse extends LinearResponse
{
	public function resolve(): UsageAlert
	{
		return UsageAlert::from($this->json('data.usageAlert'));
	}
}
