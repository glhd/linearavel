<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class DateComparator
{
	public function __construct(
		public ?CarbonImmutable $eq = null,
		public ?CarbonImmutable $neq = null,
		/** @var iterable<CarbonImmutable>|Collection<int, CarbonImmutable> */
		public ?iterable $in = null,
		/** @var iterable<CarbonImmutable>|Collection<int, CarbonImmutable> */
		public ?iterable $nin = null,
		public ?CarbonImmutable $lt = null,
		public ?CarbonImmutable $lte = null,
		public ?CarbonImmutable $gt = null,
		public ?CarbonImmutable $gte = null
	) {
	}
}
