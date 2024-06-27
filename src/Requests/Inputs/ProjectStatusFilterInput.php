<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectStatusFilter */
class ProjectStatusFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $description = null,
		public ?NumberComparatorInput $position = null,
		public ?StringComparatorInput $type = null,
		public ?ProjectCollectionFilterInput $projects = null,
		/** @var iterable<ProjectStatusFilterInput>|Collection<int, ProjectStatusFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectStatusFilterInput>|Collection<int, ProjectStatusFilterInput> */
		public ?iterable $or = null
	) {
	}
}
