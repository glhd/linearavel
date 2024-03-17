<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class InitiativeFilter
{
	public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $name = null,
        
public ?StringComparator $slugId = null,
        
public ?UserFilter $creator = null,
        
	function __construct(
		/** @var Collection<int, InitiativeFilter> */
		public Collection $and,
		/** @var Collection<int, InitiativeFilter> */
		public Collection $or,
	) {
	}
}
