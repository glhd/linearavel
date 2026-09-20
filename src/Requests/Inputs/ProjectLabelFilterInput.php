<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectLabelFilter */
class ProjectLabelFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?BooleanComparatorInput $isGroup = null,
		public ?NullableUserFilterInput $creator = null,
		public ?NullableTeamFilterInput $team = null,
		public ?ProjectLabelFilterInput $parent = null,
		/** @var iterable<ProjectLabelFilterInput>|Collection<int, ProjectLabelFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectLabelFilterInput>|Collection<int, ProjectLabelFilterInput> */
		public ?iterable $or = null
	) {
	}
}
