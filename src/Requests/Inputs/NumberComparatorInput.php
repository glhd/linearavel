<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NumberComparator */
class NumberComparatorInput
{
	public function __construct(
		public ?float $eq = null,
		public ?float $neq = null,
		/** @var iterable<float>|Collection<int, float> */
		public ?iterable $in = null,
		/** @var iterable<float>|Collection<int, float> */
		public ?iterable $nin = null,
		public ?float $lt = null,
		public ?float $lte = null,
		public ?float $gt = null,
		public ?float $gte = null
	) {
	}
}
