<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TeamFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $key = null,
		public ?NullableStringComparator $description = null,
		public ?IssueCollectionFilter $issues = null,
		/** @var iterable<TeamFilter>|Collection<int, TeamFilter> */
		public ?iterable $and = null,
		/** @var iterable<TeamFilter>|Collection<int, TeamFilter> */
		public ?iterable $or = null
	) {
	}
}
