<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectUpdateFilter
{
	public function __construct(
		/** @var Collection<int, ProjectUpdateFilter> */
		public Collection $and,
		/** @var Collection<int, ProjectUpdateFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?UserFilter $user = null,
		public ?ProjectFilter $project = null
	) {
	}
}
