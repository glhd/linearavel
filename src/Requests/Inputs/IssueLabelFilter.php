<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IssueLabelFilter
{
	public function __construct(
		/** @var iterable<IssueLabelFilter>|Collection<int, IssueLabelFilter> */
		public iterable $and,
		/** @var iterable<IssueLabelFilter>|Collection<int, IssueLabelFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableUserFilter $creator = null,
		public ?NullableTeamFilter $team = null,
		public ?IssueLabelFilter $parent = null
	) {
	}
}
