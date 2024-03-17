<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Requests\Inputs\IDComparator, Glhd\Linearavel\Requests\Inputs\DateComparator, Glhd\Linearavel\Requests\Inputs\StringComparator, Glhd\Linearavel\Requests\Inputs\NullableStringComparator, Glhd\Linearavel\Requests\Inputs\IssueCollectionFilter, Glhd\Linearavel\Requests\Inputs\NullableTeamFilter, Illuminate\Support\Collection;

class NullableTeamFilter
{
	function __construct(
		/** @var Collection<int, NullableTeamFilter> */
		public Collection $and,
		/** @var Collection<int, NullableTeamFilter> */
		public Collection $or
        public ?IDComparator $id = null,
        public ?DateComparator $createdAt = null,
        public ?DateComparator $updatedAt = null,
        public ?StringComparator $name = null,
        public ?StringComparator $key = null,
        public ?NullableStringComparator $description = null,
        public ?IssueCollectionFilter $issues = null,
        public ?bool $null = null,
    )
    {
    }
}
