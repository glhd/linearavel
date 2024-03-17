<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NumberComparator
{
	public function __construct(
		/** @var iterable<float>|Collection<int, float> */
		public iterable $in,
		/** @var iterable<float>|Collection<int, float> */
		public iterable $nin,
		public ?float $eq = null,
		public ?float $neq = null,
		public ?float $lt = null,
		public ?float $lte = null,
		public ?float $gt = null,
		public ?float $gte = null
	) {
	}
}
