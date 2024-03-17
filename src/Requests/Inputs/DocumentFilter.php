<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class DocumentFilter
{
	public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $title = null,
        
public ?StringComparator $slugId = null,
        
public ?UserFilter $creator = null,
        
public ?ProjectFilter $project = null,
        
	function __construct(
		/** @var Collection<int, DocumentFilter> */
		public Collection $and,
		/** @var Collection<int, DocumentFilter> */
		public Collection $or,
	) {
	}
}
