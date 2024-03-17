<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class EstimateComparator
{
	public function __construct(
		/** @var iterable<float>|Collection<int, float> */
		public iterable $in,
		/** @var iterable<float>|Collection<int, float> */
		public iterable $nin,
		/** @var iterable<NullableNumberComparator>|Collection<int, NullableNumberComparator> */
		public iterable $or,
		/** @var iterable<NullableNumberComparator>|Collection<int, NullableNumberComparator> */
		public iterable $and,
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
