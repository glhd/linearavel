<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectMilestoneFilter
{
	public function __construct(
		/** @var Collection<int, ProjectMilestoneFilter> */
		public Collection $and,
		/** @var Collection<int, ProjectMilestoneFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableDateComparator $targetDate = null
	) {
	}
}
