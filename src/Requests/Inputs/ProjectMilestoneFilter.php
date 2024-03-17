<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectMilestoneFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableDateComparator $targetDate = null,
		/** @var iterable<ProjectMilestoneFilter>|Collection<int, ProjectMilestoneFilter> */
		public ?iterable $and = null,
		/** @var iterable<ProjectMilestoneFilter>|Collection<int, ProjectMilestoneFilter> */
		public ?iterable $or = null
	) {
	}
}
