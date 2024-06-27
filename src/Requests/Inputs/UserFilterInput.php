<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/UserFilter */
class UserFilterInput
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
		/** @var iterable<UserFilterInput>|Collection<int, UserFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<UserFilterInput>|Collection<int, UserFilterInput> */
		public ?iterable $or = null
	) {
	}
}
