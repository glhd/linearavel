<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableCustomerFilter */
class NullableCustomerFilterInput
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
		public ?bool $null = null,
		/** @var iterable<NullableCustomerFilterInput>|Collection<int, NullableCustomerFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableCustomerFilterInput>|Collection<int, NullableCustomerFilterInput> */
		public ?iterable $or = null
	) {
	}
}
