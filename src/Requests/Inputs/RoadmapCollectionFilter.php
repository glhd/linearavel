<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class RoadmapCollectionFilter
{
	public function __construct(
		/** @var iterable<RoadmapCollectionFilter>|Collection<int, RoadmapCollectionFilter> */
		public iterable $and,
		/** @var iterable<RoadmapCollectionFilter>|Collection<int, RoadmapCollectionFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		public ?RoadmapFilter $some = null,
		public ?RoadmapFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
