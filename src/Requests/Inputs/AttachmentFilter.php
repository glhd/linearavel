<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class AttachmentFilter
{
public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $title = null,
        
public ?NullableStringComparator $subtitle = null,
        
public ?StringComparator $url = null,
        
public ?NullableUserFilter $creator = null,
        
public ?SourceTypeComparator $sourceType = null,
        
	function __construct(
		/** @var Collection<int, AttachmentFilter> */
		public Collection $and,
		/** @var Collection<int, AttachmentFilter> */
		public Collection $or,
    )
    {
    }
}
