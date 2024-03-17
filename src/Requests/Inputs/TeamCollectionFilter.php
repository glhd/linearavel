<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TeamCollectionFilter
{
	public function __construct(
		/** @var iterable<TeamCollectionFilter>|Collection<int, TeamCollectionFilter> */
		public iterable $and,
		/** @var iterable<TeamCollectionFilter>|Collection<int, TeamCollectionFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?TeamFilter $some = null,
		public ?TeamFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
