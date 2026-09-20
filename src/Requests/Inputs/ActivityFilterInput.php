<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ActivityFilter */
class ActivityFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UserFilterInput $user = null,
		/** @var iterable<ActivityFilterInput>|Collection<int, ActivityFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ActivityFilterInput>|Collection<int, ActivityFilterInput> */
		public ?iterable $or = null
	) {
	}
}
