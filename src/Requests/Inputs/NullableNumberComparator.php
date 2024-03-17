<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableNumberComparator
{
	function __construct(
		/** @var Collection<int, float> */
		public Collection $in,
		/** @var Collection<int, float> */
		public Collection $nin,
		public ?float $eq = null,
		public ?float $neq = null,
		public ?bool $null = null,
		public ?float $lt = null,
		public ?float $lte = null,
		public ?float $gt = null,
		public ?float $gte = null
	) {
	}
}
