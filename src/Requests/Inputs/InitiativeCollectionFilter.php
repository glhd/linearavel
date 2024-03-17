<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class InitiativeCollectionFilter
{
	function __construct(
		/** @var Collection<int, InitiativeCollectionFilter> */
		public Collection $and,
		/** @var Collection<int, InitiativeCollectionFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		public ?InitiativeFilter $some = null,
		public ?InitiativeFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
