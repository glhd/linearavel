<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class DateComparator
{
	function __construct(
		/** @var Collection<int, CarbonImmutable> */
		public Collection $in,
		/** @var Collection<int, CarbonImmutable> */
		public Collection $nin,
		public ?CarbonImmutable $eq = null,
		public ?CarbonImmutable $neq = null,
		public ?CarbonImmutable $lt = null,
		public ?CarbonImmutable $lte = null,
		public ?CarbonImmutable $gt = null,
		public ?CarbonImmutable $gte = null
	) {
	}
}
