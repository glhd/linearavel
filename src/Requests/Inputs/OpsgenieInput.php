<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OpsgenieInput */
class OpsgenieInput
{
	public function __construct(public DateTimeInterface $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
