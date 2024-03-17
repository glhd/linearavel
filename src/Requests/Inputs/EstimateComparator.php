<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class EstimateComparator
{
public ?float $eq = null
        
public ?float $neq = null,
        
public ?bool $null = null,
        
public ?float $lt = null,
        
public ?float $lte = null,
        
public ?float $gt = null,
        
public ?float $gte = null,
        
	function __construct(
		/** @var Collection<int, float> */
		public Collection $in,
		/** @var Collection<int, float> */
		public Collection $nin,
		/** @var Collection<int, NullableNumberComparator> */
		public Collection $or,
		/** @var Collection<int, NullableNumberComparator> */
		public Collection $and,
    )
    {
    }
}
