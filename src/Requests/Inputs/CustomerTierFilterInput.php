<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerTierFilter */
class CustomerTierFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $displayName = null,
		public ?StringComparatorInput $description = null,
		public ?NumberComparatorInput $position = null,
		public ?StringComparatorInput $color = null,
		/** @var iterable<CustomerTierFilterInput>|Collection<int, CustomerTierFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<CustomerTierFilterInput>|Collection<int, CustomerTierFilterInput> */
		public ?iterable $or = null
	) {
	}
}
