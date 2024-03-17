<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableTemplateFilter
{
public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $name = null,
        
public ?bool $null = null,
        
	function __construct(
		/** @var Collection<int, NullableTemplateFilter> */
		public Collection $and,
		/** @var Collection<int, NullableTemplateFilter> */
		public Collection $or,
    )
    {
    }
}
