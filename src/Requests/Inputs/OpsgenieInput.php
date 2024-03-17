<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

class OpsgenieInput
{
	public function __construct(public DateTimeInterface $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
