<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

class PagerDutyInput
{
	public function __construct(public DateTimeInterface $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
