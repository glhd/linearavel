<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IssueLabelCollectionFilter
{
	function __construct(
		/** @var Collection<int, IssueLabelCollectionFilter> */
		public Collection $and,
		/** @var Collection<int, IssueLabelCollectionFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableUserFilter $creator = null,
		public ?NullableTeamFilter $team = null,
		public ?IssueLabelFilter $parent = null,
		public ?IssueLabelFilter $some = null,
		public ?IssueLabelFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
