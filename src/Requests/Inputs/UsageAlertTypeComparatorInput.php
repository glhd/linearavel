<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\UsageAlertType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/UsageAlertTypeComparator */
class UsageAlertTypeComparatorInput
{
	public function __construct(
		public ?UsageAlertType $eq = null,
		public ?UsageAlertType $neq = null,
		/** @var iterable<UsageAlertType>|Collection<int, UsageAlertType> */
		public ?iterable $in = null,
		/** @var iterable<UsageAlertType>|Collection<int, UsageAlertType> */
		public ?iterable $nin = null
	) {
	}
}
