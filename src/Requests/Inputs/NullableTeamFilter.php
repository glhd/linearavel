<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableTeamFilter
{
public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $name = null,
        
public ?StringComparator $key = null,
        
public ?NullableStringComparator $description = null,
        
public ?IssueCollectionFilter $issues = null,
        
public ?bool $null = null,
        
	function __construct(
		/** @var Collection<int, NullableTeamFilter> */
		public Collection $and,
		/** @var Collection<int, NullableTeamFilter> */
		public Collection $or,
    )
    {
    }
}
