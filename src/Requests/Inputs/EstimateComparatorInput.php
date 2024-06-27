<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EstimateComparator */
class EstimateComparatorInput
{
	public function __construct(
		public ?float $eq = null,
		public ?float $neq = null,
		/** @var iterable<float>|Collection<int, float> */
		public ?iterable $in = null,
		/** @var iterable<float>|Collection<int, float> */
		public ?iterable $nin = null,
		public ?bool $null = null,
		public ?float $lt = null,
		public ?float $lte = null,
		public ?float $gt = null,
		public ?float $gte = null,
		/** @var iterable<NullableNumberComparatorInput>|Collection<int, NullableNumberComparatorInput> */
		public ?iterable $or = null,
		/** @var iterable<NullableNumberComparatorInput>|Collection<int, NullableNumberComparatorInput> */
		public ?iterable $and = null
	) {
	}
}
