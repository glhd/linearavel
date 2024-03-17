<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class RoadmapFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		/** @var iterable<RoadmapFilter>|Collection<int, RoadmapFilter> */
		public ?iterable $and = null,
		/** @var iterable<RoadmapFilter>|Collection<int, RoadmapFilter> */
		public ?iterable $or = null
	) {
	}
}
