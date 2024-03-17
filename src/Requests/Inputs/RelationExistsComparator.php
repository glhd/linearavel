<?php

namespace Glhd\Linearavel\Requests\Inputs;

class RelationExistsComparator
{
	public function __construct(public ?bool $eq = null, public ?bool $neq = null)
	{
	}
}
