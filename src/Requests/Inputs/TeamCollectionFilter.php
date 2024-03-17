<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TeamCollectionFilter
{
	function __construct(
		/** @var Collection<int, TeamCollectionFilter> */
		public Collection $and,
		/** @var Collection<int, TeamCollectionFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?TeamFilter $some = null,
		public ?TeamFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
