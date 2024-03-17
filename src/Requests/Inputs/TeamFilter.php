<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TeamFilter
{
	public function __construct(
		/** @var iterable<TeamFilter>|Collection<int, TeamFilter> */
		public iterable $and,
		/** @var iterable<TeamFilter>|Collection<int, TeamFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $key = null,
		public ?NullableStringComparator $description = null,
		public ?IssueCollectionFilter $issues = null
	) {
	}
}
