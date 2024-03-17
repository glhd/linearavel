<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Requests\Inputs\IDComparator, Glhd\Linearavel\Requests\Inputs\DateComparator, Glhd\Linearavel\Requests\Inputs\StringComparator, Glhd\Linearavel\Requests\Inputs\NullableDateComparator, Glhd\Linearavel\Requests\Inputs\NullableProjectMilestoneFilter, Illuminate\Support\Collection;

class NullableProjectMilestoneFilter
{
	function __construct(
		/** @var Collection<int, NullableProjectMilestoneFilter> */
		public Collection $and,
		/** @var Collection<int, NullableProjectMilestoneFilter> */
		public Collection $or
        public ?IDComparator $id = null,
        public ?DateComparator $createdAt = null,
        public ?DateComparator $updatedAt = null,
        public ?StringComparator $name = null,
        public ?NullableDateComparator $targetDate = null,
        public ?bool $null = null,
    )
    {
    }
}
