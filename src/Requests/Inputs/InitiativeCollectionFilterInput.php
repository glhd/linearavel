<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class InitiativeCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slugId = null,
		public ?UserFilterInput $creator = null,
		/** @var iterable<InitiativeCollectionFilterInput>|Collection<int, InitiativeCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeCollectionFilterInput>|Collection<int, InitiativeCollectionFilterInput> */
		public ?iterable $or = null,
		public ?InitiativeFilterInput $some = null,
		public ?InitiativeFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
