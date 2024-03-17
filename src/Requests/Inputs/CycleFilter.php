<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class CycleFilter
{
public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?NumberComparator $number = null,
        
public ?StringComparator $name = null,
        
public ?DateComparator $startsAt = null,
        
public ?DateComparator $endsAt = null,
        
public ?DateComparator $completedAt = null,
        
public ?BooleanComparator $isActive = null,
        
public ?BooleanComparator $isInCooldown = null,
        
public ?BooleanComparator $isNext = null,
        
public ?BooleanComparator $isPrevious = null,
        
public ?BooleanComparator $isFuture = null,
        
public ?BooleanComparator $isPast = null,
        
public ?TeamFilter $team = null,
        
public ?IssueCollectionFilter $issues = null,
        
	function __construct(
		/** @var Collection<int, CycleFilter> */
		public Collection $and,
		/** @var Collection<int, CycleFilter> */
		public Collection $or,
    )
    {
    }
}
