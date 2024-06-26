<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class RoadmapCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slugId = null,
		public ?UserFilterInput $creator = null,
		/** @var iterable<RoadmapCollectionFilterInput>|Collection<int, RoadmapCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<RoadmapCollectionFilterInput>|Collection<int, RoadmapCollectionFilterInput> */
		public ?iterable $or = null,
		public ?RoadmapFilterInput $some = null,
		public ?RoadmapFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
