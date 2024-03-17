<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IssueLabelFilter
{
public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $name = null,
        
public ?NullableUserFilter $creator = null,
        
public ?NullableTeamFilter $team = null,
        
public ?IssueLabelFilter $parent = null,
        
	function __construct(
		/** @var Collection<int, IssueLabelFilter> */
		public Collection $and,
		/** @var Collection<int, IssueLabelFilter> */
		public Collection $or,
    )
    {
    }
}
