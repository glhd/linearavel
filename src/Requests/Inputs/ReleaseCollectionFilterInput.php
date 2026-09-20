<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseCollectionFilter */
class ReleaseCollectionFilterInput
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
		/** @var iterable<ReleaseCollectionFilterInput>|Collection<int, ReleaseCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReleaseCollectionFilterInput>|Collection<int, ReleaseCollectionFilterInput> */
		public ?iterable $or = null,
		public ?ReleaseFilterInput $some = null,
		public ?ReleaseFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
