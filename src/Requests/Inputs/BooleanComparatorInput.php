<?php

namespace Glhd\Linearavel\Requests\Inputs;

class BooleanComparatorInput
{
	public function __construct(public ?bool $eq = null, public ?bool $neq = null)
	{
	}
}
