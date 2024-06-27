<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/UserCollectionFilter */
class UserCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $displayName = null,
		public ?StringComparatorInput $email = null,
		public ?BooleanComparatorInput $active = null,
		public ?IssueCollectionFilterInput $assignedIssues = null,
		public ?BooleanComparatorInput $admin = null,
		public ?BooleanComparatorInput $isMe = null,
		/** @var iterable<UserCollectionFilterInput>|Collection<int, UserCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<UserCollectionFilterInput>|Collection<int, UserCollectionFilterInput> */
		public ?iterable $or = null,
		public ?UserFilterInput $some = null,
		public ?UserFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
