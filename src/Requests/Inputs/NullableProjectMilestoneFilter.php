<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableProjectMilestoneFilter
{
	public function __construct(
		/** @var iterable<NullableProjectMilestoneFilter>|Collection<int, NullableProjectMilestoneFilter> */
		public iterable $and,
		/** @var iterable<NullableProjectMilestoneFilter>|Collection<int, NullableProjectMilestoneFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableDateComparator $targetDate = null,
		public ?bool $null = null
	) {
	}
}
