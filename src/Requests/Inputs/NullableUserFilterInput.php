<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableUserFilterInput
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
		public ?bool $null = null,
		/** @var iterable<NullableUserFilterInput>|Collection<int, NullableUserFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableUserFilterInput>|Collection<int, NullableUserFilterInput> */
		public ?iterable $or = null
	) {
	}
}
