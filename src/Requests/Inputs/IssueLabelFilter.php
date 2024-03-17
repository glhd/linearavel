<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IssueLabelFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableUserFilter $creator = null,
		public ?NullableTeamFilter $team = null,
		public ?IssueLabelFilter $parent = null,
		/** @var iterable<IssueLabelFilter>|Collection<int, IssueLabelFilter> */
		public ?iterable $and = null,
		/** @var iterable<IssueLabelFilter>|Collection<int, IssueLabelFilter> */
		public ?iterable $or = null
	) {
	}
}
