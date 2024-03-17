<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableProjectMilestoneFilter
{
	public function __construct(
		/** @var Collection<int, NullableProjectMilestoneFilter> */
		public Collection $and,
		/** @var Collection<int, NullableProjectMilestoneFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableDateComparator $targetDate = null,
		public ?bool $null = null
	) {
	}
}
