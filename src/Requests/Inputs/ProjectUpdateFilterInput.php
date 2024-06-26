<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class ProjectUpdateFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UserFilterInput $user = null,
		public ?ProjectFilterInput $project = null,
		/** @var iterable<ProjectUpdateFilterInput>|Collection<int, ProjectUpdateFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectUpdateFilterInput>|Collection<int, ProjectUpdateFilterInput> */
		public ?iterable $or = null
	) {
	}
}
