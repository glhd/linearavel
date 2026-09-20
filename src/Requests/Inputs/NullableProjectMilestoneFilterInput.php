<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableProjectMilestoneFilter */
class NullableProjectMilestoneFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?NullableStringComparatorInput $name = null,
		public ?NullableDateComparatorInput $targetDate = null,
		public ?NullableProjectFilterInput $project = null,
		public ?bool $null = null,
		/** @var iterable<NullableProjectMilestoneFilterInput>|Collection<int, NullableProjectMilestoneFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableProjectMilestoneFilterInput>|Collection<int, NullableProjectMilestoneFilterInput> */
		public ?iterable $or = null
	) {
	}
}
