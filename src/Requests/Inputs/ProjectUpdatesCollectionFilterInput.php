<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectUpdatesCollectionFilter */
class ProjectUpdatesCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $health = null,
		/** @var iterable<ProjectUpdatesCollectionFilterInput>|Collection<int, ProjectUpdatesCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectUpdatesCollectionFilterInput>|Collection<int, ProjectUpdatesCollectionFilterInput> */
		public ?iterable $or = null,
		public ?ProjectUpdatesFilterInput $some = null,
		public ?ProjectUpdatesFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
