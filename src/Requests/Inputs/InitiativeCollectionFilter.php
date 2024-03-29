<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class InitiativeCollectionFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		/** @var iterable<InitiativeCollectionFilter>|Collection<int, InitiativeCollectionFilter> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeCollectionFilter>|Collection<int, InitiativeCollectionFilter> */
		public ?iterable $or = null,
		public ?InitiativeFilter $some = null,
		public ?InitiativeFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
