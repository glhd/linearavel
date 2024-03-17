<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class NullableDateComparator
{
	public function __construct(
		/** @var iterable<CarbonImmutable>|Collection<int, CarbonImmutable> */
		public iterable $in,
		/** @var iterable<CarbonImmutable>|Collection<int, CarbonImmutable> */
		public iterable $nin,
		public ?CarbonImmutable $eq = null,
		public ?CarbonImmutable $neq = null,
		public ?bool $null = null,
		public ?CarbonImmutable $lt = null,
		public ?CarbonImmutable $lte = null,
		public ?CarbonImmutable $gt = null,
		public ?CarbonImmutable $gte = null
	) {
	}
}
