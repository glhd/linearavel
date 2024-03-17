<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TeamFilter
{
public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $name = null,
        
public ?StringComparator $key = null,
        
public ?NullableStringComparator $description = null,
        
public ?IssueCollectionFilter $issues = null,
        
	function __construct(
		/** @var Collection<int, TeamFilter> */
		public Collection $and,
		/** @var Collection<int, TeamFilter> */
		public Collection $or,
    )
    {
    }
}
