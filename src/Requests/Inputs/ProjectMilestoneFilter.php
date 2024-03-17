<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectMilestoneFilter
{
	public function __construct(
		/** @var iterable<ProjectMilestoneFilter>|Collection<int, ProjectMilestoneFilter> */
		public iterable $and,
		/** @var iterable<ProjectMilestoneFilter>|Collection<int, ProjectMilestoneFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableDateComparator $targetDate = null
	) {
	}
}
