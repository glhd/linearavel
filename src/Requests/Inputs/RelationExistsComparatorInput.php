<?php

namespace Glhd\Linearavel\Requests\Inputs;

class RelationExistsComparatorInput
{
	public function __construct(public ?bool $eq = null, public ?bool $neq = null)
	{
	}
}
