<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleasePipelineCollectionFilter */
class ReleasePipelineCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?BooleanComparatorInput $isProduction = null,
		public ?ReleasePipelineTypeComparatorInput $type = null,
		public ?TeamCollectionFilterInput $teams = null,
		/** @var iterable<ReleasePipelineCollectionFilterInput>|Collection<int, ReleasePipelineCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReleasePipelineCollectionFilterInput>|Collection<int, ReleasePipelineCollectionFilterInput> */
		public ?iterable $or = null,
		public ?ReleasePipelineFilterInput $some = null,
		public ?ReleasePipelineFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
