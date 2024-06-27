<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CycleShiftAllInput */
class CycleShiftAllInput
{
	public function __construct(public string $id, public float $daysToShift)
	{
	}
}
