<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerFilter */
class CustomerFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slackChannelId = null,
		public ?StringArrayComparatorInput $domains = null,
		public ?StringArrayComparatorInput $externalIds = null,
		public ?NullableUserFilterInput $owner = null,
		public ?CustomerNeedCollectionFilterInput $needs = null,
		public ?NumberComparatorInput $revenue = null,
		public ?NumberComparatorInput $size = null,
		public ?CustomerStatusFilterInput $status = null,
		public ?CustomerTierFilterInput $tier = null,
		/** @var iterable<CustomerFilterInput>|Collection<int, CustomerFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<CustomerFilterInput>|Collection<int, CustomerFilterInput> */
		public ?iterable $or = null
	) {
	}
}
