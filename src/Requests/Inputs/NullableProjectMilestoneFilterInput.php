<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableProjectMilestoneFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?NullableDateComparatorInput $targetDate = null,
		public ?bool $null = null,
		/** @var iterable<NullableProjectMilestoneFilterInput>|Collection<int, NullableProjectMilestoneFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableProjectMilestoneFilterInput>|Collection<int, NullableProjectMilestoneFilterInput> */
		public ?iterable $or = null
	) {
	}
}
