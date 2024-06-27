<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectMilestoneCollectionFilter */
class ProjectMilestoneCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?NullableDateComparatorInput $targetDate = null,
		/** @var iterable<ProjectMilestoneCollectionFilterInput>|Collection<int, ProjectMilestoneCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectMilestoneCollectionFilterInput>|Collection<int, ProjectMilestoneCollectionFilterInput> */
		public ?iterable $or = null,
		public ?ProjectMilestoneFilterInput $some = null,
		public ?ProjectMilestoneFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
