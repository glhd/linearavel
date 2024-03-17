<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableUserFilter
{
	public ?IDComparator $id = null
        
public ?DateComparator $createdAt = null,
        
public ?DateComparator $updatedAt = null,
        
public ?StringComparator $name = null,
        
public ?StringComparator $displayName = null,
        
public ?StringComparator $email = null,
        
public ?BooleanComparator $active = null,
        
public ?IssueCollectionFilter $assignedIssues = null,
        
public ?BooleanComparator $admin = null,
        
public ?BooleanComparator $isMe = null,
        
public ?bool $null = null,
        
	function __construct(
		/** @var Collection<int, NullableUserFilter> */
		public Collection $and,
		/** @var Collection<int, NullableUserFilter> */
		public Collection $or,
	) {
	}
}
