<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectStatusFilter
{
	public function __construct(
		/** @var Collection<int, ProjectStatusFilter> */
		public Collection $and,
		/** @var Collection<int, ProjectStatusFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $description = null,
		public ?NumberComparator $position = null,
		public ?StringComparator $type = null,
		public ?ProjectCollectionFilter $projects = null
	) {
	}
}
