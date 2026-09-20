<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomViewFilter */
class CustomViewFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $modelName = null,
		public ?NullableTeamFilterInput $team = null,
		public ?UserFilterInput $creator = null,
		public ?BooleanComparatorInput $shared = null,
		public ?bool $hasFacet = null,
		/** @var iterable<CustomViewFilterInput>|Collection<int, CustomViewFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<CustomViewFilterInput>|Collection<int, CustomViewFilterInput> */
		public ?iterable $or = null
	) {
	}
}
