<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TimelessDateComparator
{
	function __construct(
		/** @var Collection<int, string> */
		public Collection $in,
		/** @var Collection<int, string> */
		public Collection $nin,
		public ?string $eq = null,
		public ?string $neq = null,
		public ?string $lt = null,
		public ?string $lte = null,
		public ?string $gt = null,
		public ?string $gte = null
	) {
	}
}
