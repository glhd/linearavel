<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class CycleFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?NumberComparatorInput $number = null,
		public ?StringComparatorInput $name = null,
		public ?DateComparatorInput $startsAt = null,
		public ?DateComparatorInput $endsAt = null,
		public ?DateComparatorInput $completedAt = null,
		public ?BooleanComparatorInput $isActive = null,
		public ?BooleanComparatorInput $isInCooldown = null,
		public ?BooleanComparatorInput $isNext = null,
		public ?BooleanComparatorInput $isPrevious = null,
		public ?BooleanComparatorInput $isFuture = null,
		public ?BooleanComparatorInput $isPast = null,
		public ?TeamFilterInput $team = null,
		public ?IssueCollectionFilterInput $issues = null,
		/** @var iterable<CycleFilterInput>|Collection<int, CycleFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<CycleFilterInput>|Collection<int, CycleFilterInput> */
		public ?iterable $or = null
	) {
	}
}
