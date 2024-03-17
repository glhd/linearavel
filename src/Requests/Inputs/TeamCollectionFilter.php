<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TeamCollectionFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		/** @var iterable<TeamCollectionFilter>|Collection<int, TeamCollectionFilter> */
		public ?iterable $and = null,
		/** @var iterable<TeamCollectionFilter>|Collection<int, TeamCollectionFilter> */
		public ?iterable $or = null,
		public ?TeamFilter $some = null,
		public ?TeamFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
