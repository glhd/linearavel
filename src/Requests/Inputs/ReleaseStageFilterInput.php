<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseStageFilter */
class ReleaseStageFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?ReleaseStageTypeComparatorInput $type = null,
		public ?StringComparatorInput $name = null,
		/** @var iterable<ReleaseStageFilterInput>|Collection<int, ReleaseStageFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReleaseStageFilterInput>|Collection<int, ReleaseStageFilterInput> */
		public ?iterable $or = null
	) {
	}
}
