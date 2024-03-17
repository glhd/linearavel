<?php

namespace Glhd\Linearavel\Requests\Inputs;

class CycleShiftAllInput
{
	public function __construct(public string $id, public float $daysToShift)
	{
	}
}
