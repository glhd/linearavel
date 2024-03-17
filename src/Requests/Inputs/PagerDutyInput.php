<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class PagerDutyInput
{
	public function __construct(public CarbonImmutable $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
