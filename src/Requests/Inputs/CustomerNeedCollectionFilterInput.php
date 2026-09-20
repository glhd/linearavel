<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerNeedCollectionFilter */
class CustomerNeedCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?NumberComparatorInput $priority = null,
		public ?NullableProjectFilterInput $project = null,
		public ?NullableIssueFilterInput $issue = null,
		public ?NullableCommentFilterInput $comment = null,
		public ?NullableCustomerFilterInput $customer = null,
		/** @var iterable<CustomerNeedCollectionFilterInput>|Collection<int, CustomerNeedCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<CustomerNeedCollectionFilterInput>|Collection<int, CustomerNeedCollectionFilterInput> */
		public ?iterable $or = null,
		public ?CustomerNeedFilterInput $some = null,
		public ?CustomerNeedFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
