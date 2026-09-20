<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectLabelCollectionFilter */
class ProjectLabelCollectionFilterInput
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
		public ?bool $null = null,
		/** @var iterable<ProjectLabelCollectionFilterInput>|Collection<int, ProjectLabelCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectLabelCollectionFilterInput>|Collection<int, ProjectLabelCollectionFilterInput> */
		public ?iterable $or = null,
		public ?ProjectLabelCollectionFilterInput $some = null,
		public ?ProjectLabelFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
