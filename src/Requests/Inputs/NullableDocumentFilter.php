<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableDocumentFilter
{
	public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $title = null,
        
public ?StringComparator $slugId = null,
        
public ?UserFilter $creator = null,
        
public ?ProjectFilter $project = null,
        
public ?bool $null = null,
        
	function __construct(
		/** @var Collection<int, NullableDocumentFilter> */
		public Collection $and,
		/** @var Collection<int, NullableDocumentFilter> */
		public Collection $or,
	) {
	}
}
