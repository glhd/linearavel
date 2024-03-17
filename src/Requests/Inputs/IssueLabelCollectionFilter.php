<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IssueLabelCollectionFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?NullableUserFilter $creator = null,
		public ?NullableTeamFilter $team = null,
		public ?IssueLabelFilter $parent = null,
		/** @var iterable<IssueLabelCollectionFilter>|Collection<int, IssueLabelCollectionFilter> */
		public ?iterable $and = null,
		/** @var iterable<IssueLabelCollectionFilter>|Collection<int, IssueLabelCollectionFilter> */
		public ?iterable $or = null,
		public ?IssueLabelFilter $some = null,
		public ?IssueLabelFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
