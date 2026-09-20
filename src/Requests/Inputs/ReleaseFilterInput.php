<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseFilter */
class ReleaseFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $version = null,
		public ?ReleasePipelineFilterInput $pipeline = null,
		public ?ReleaseStageFilterInput $stage = null,
		public ?NullableDateComparatorInput $completedAt = null,
		public ?BooleanComparatorInput $hasReleaseNotes = null,
		/** @var iterable<ReleaseFilterInput>|Collection<int, ReleaseFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReleaseFilterInput>|Collection<int, ReleaseFilterInput> */
		public ?iterable $or = null
	) {
	}
}
