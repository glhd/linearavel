<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class OpsgenieInput
{
	function __construct(public CarbonImmutable $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
