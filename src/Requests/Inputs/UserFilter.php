<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class UserFilter
{
	public function __construct(
		/** @var iterable<UserFilter>|Collection<int, UserFilter> */
		public iterable $and,
		/** @var iterable<UserFilter>|Collection<int, UserFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $displayName = null,
		public ?StringComparator $email = null,
		public ?BooleanComparator $active = null,
		public ?IssueCollectionFilter $assignedIssues = null,
		public ?BooleanComparator $admin = null,
		public ?BooleanComparator $isMe = null
	) {
	}
}
