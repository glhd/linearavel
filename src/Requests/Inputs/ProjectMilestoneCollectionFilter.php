<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectMilestoneCollectionFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableDateComparator $targetDate = null,
		/** @var iterable<ProjectMilestoneCollectionFilter>|Collection<int, ProjectMilestoneCollectionFilter> */
		public ?iterable $and = null,
		/** @var iterable<ProjectMilestoneCollectionFilter>|Collection<int, ProjectMilestoneCollectionFilter> */
		public ?iterable $or = null,
		public ?ProjectMilestoneFilter $some = null,
		public ?ProjectMilestoneFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
