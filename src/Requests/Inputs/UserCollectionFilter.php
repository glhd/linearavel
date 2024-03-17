<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class UserCollectionFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $displayName = null,
		public ?StringComparator $email = null,
		public ?BooleanComparator $active = null,
		public ?IssueCollectionFilter $assignedIssues = null,
		public ?BooleanComparator $admin = null,
		public ?BooleanComparator $isMe = null,
		/** @var iterable<UserCollectionFilter>|Collection<int, UserCollectionFilter> */
		public ?iterable $and = null,
		/** @var iterable<UserCollectionFilter>|Collection<int, UserCollectionFilter> */
		public ?iterable $or = null,
		public ?UserFilter $some = null,
		public ?UserFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
