<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IDComparator
{
	public ?string $eq = null
        
public ?string $neq = null,
        
	function __construct(
		/** @var Collection<int, string> */
		public Collection $in,
		/** @var Collection<int, string> */
		public Collection $nin,
	) {
	}
}
