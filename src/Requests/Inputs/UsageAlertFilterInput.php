<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/UsageAlertFilter */
class UsageAlertFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UsageAlertTypeComparatorInput $type = null,
		/** @var iterable<UsageAlertFilterInput>|Collection<int, UsageAlertFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<UsageAlertFilterInput>|Collection<int, UsageAlertFilterInput> */
		public ?iterable $or = null
	) {
	}
}
