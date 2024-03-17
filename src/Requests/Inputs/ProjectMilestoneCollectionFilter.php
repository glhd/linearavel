<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectMilestoneCollectionFilter
{
	function __construct(
		/** @var Collection<int, ProjectMilestoneCollectionFilter> */
		public Collection $and,
		/** @var Collection<int, ProjectMilestoneCollectionFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableDateComparator $targetDate = null,
		public ?ProjectMilestoneFilter $some = null,
		public ?ProjectMilestoneFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
