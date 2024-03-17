<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectStatusFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $description = null,
		public ?NumberComparator $position = null,
		public ?StringComparator $type = null,
		public ?ProjectCollectionFilter $projects = null,
		/** @var iterable<ProjectStatusFilter>|Collection<int, ProjectStatusFilter> */
		public ?iterable $and = null,
		/** @var iterable<ProjectStatusFilter>|Collection<int, ProjectStatusFilter> */
		public ?iterable $or = null
	) {
	}
}
