<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeUpdatesCollectionFilter */
class InitiativeUpdatesCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		/** @var iterable<InitiativeUpdatesCollectionFilterInput>|Collection<int, InitiativeUpdatesCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeUpdatesCollectionFilterInput>|Collection<int, InitiativeUpdatesCollectionFilterInput> */
		public ?iterable $or = null,
		public ?InitiativeUpdatesFilterInput $some = null,
		public ?InitiativeUpdatesFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
