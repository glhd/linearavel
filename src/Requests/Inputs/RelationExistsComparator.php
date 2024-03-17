<?php

namespace Glhd\Linearavel\Requests\Inputs;

class RelationExistsComparator
{
	function __construct(public ?bool $eq = null, public ?bool $neq = null)
	{
	}
}
