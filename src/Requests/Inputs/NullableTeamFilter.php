<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableTeamFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $key = null,
		public ?NullableStringComparator $description = null,
		public ?IssueCollectionFilter $issues = null,
		public ?bool $null = null,
		/** @var iterable<NullableTeamFilter>|Collection<int, NullableTeamFilter> */
		public ?iterable $and = null,
		/** @var iterable<NullableTeamFilter>|Collection<int, NullableTeamFilter> */
		public ?iterable $or = null
	) {
	}
}
