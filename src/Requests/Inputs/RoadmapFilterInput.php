<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/RoadmapFilter */
class RoadmapFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slugId = null,
		public ?UserFilterInput $creator = null,
		/** @var iterable<RoadmapFilterInput>|Collection<int, RoadmapFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<RoadmapFilterInput>|Collection<int, RoadmapFilterInput> */
		public ?iterable $or = null
	) {
	}
}
