<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ActivityCollectionFilter */
class ActivityCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UserFilterInput $user = null,
		/** @var iterable<ActivityCollectionFilterInput>|Collection<int, ActivityCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ActivityCollectionFilterInput>|Collection<int, ActivityCollectionFilterInput> */
		public ?iterable $or = null,
		public ?ActivityFilterInput $some = null,
		public ?ActivityFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
