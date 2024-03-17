<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class RoadmapCollectionFilter
{
	public function __construct(
		/** @var Collection<int, RoadmapCollectionFilter> */
		public Collection $and,
		/** @var Collection<int, RoadmapCollectionFilter> */
		public Collection $or,
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
