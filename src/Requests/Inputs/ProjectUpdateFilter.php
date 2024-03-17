<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectUpdateFilter
{
	public function __construct(
		/** @var iterable<ProjectUpdateFilter>|Collection<int, ProjectUpdateFilter> */
		public iterable $and,
		/** @var iterable<ProjectUpdateFilter>|Collection<int, ProjectUpdateFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?UserFilter $user = null,
		public ?ProjectFilter $project = null
	) {
	}
}
