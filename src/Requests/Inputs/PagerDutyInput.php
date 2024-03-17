<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class PagerDutyInput
{
	function __construct(public CarbonImmutable $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
