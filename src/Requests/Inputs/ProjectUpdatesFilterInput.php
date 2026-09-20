<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectUpdatesFilter */
class ProjectUpdatesFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $health = null,
		/** @var iterable<ProjectUpdatesFilterInput>|Collection<int, ProjectUpdatesFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ProjectUpdatesFilterInput>|Collection<int, ProjectUpdatesFilterInput> */
		public ?iterable $or = null
	) {
	}
}
