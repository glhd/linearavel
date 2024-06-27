<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/PagerDutyInput */
class PagerDutyInput
{
	public function __construct(public DateTimeInterface $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
