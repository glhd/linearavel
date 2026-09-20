<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeUpdatesFilter */
class InitiativeUpdatesFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		/** @var iterable<InitiativeUpdatesFilterInput>|Collection<int, InitiativeUpdatesFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeUpdatesFilterInput>|Collection<int, InitiativeUpdatesFilterInput> */
		public ?iterable $or = null
	) {
	}
}
