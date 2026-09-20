<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleasePipelineFilter */
class ReleasePipelineFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?BooleanComparatorInput $isProduction = null,
		public ?ReleasePipelineTypeComparatorInput $type = null,
		public ?TeamCollectionFilterInput $teams = null,
		/** @var iterable<ReleasePipelineFilterInput>|Collection<int, ReleasePipelineFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReleasePipelineFilterInput>|Collection<int, ReleasePipelineFilterInput> */
		public ?iterable $or = null
	) {
	}
}
