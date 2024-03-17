<?php

namespace Glhd\Linearavel\Requests\Inputs;

class CycleShiftAllInput
{
	function __construct(public string $id, public float $daysToShift)
	{
	}
}
