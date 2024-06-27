<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectMilestoneFilter */
class ProjectMilestoneFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?NullableDateComparatorInput $targetDate = null,
		/** @var iterable<ProjectMilestoneFilterInput>|Collection<int, ProjectMilestoneFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectMilestoneFilterInput>|Collection<int, ProjectMilestoneFilterInput> */
		public ?iterable $or = null
	) {
	}
}
