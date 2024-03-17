<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class OpsgenieInput
{
	public function __construct(public CarbonImmutable $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
