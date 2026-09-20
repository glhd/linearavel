<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\CyclePeriod;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CyclePeriodComparator */
class CyclePeriodComparatorInput
{
	public function __construct(
		public ?CyclePeriod $eq = null,
		public ?CyclePeriod $neq = null,
		/** @var iterable<CyclePeriod>|Collection<int, CyclePeriod> */
		public ?iterable $in = null,
		/** @var iterable<CyclePeriod>|Collection<int, CyclePeriod> */
		public ?iterable $nin = null,
		public ?bool $null = null
	) {
	}
}
