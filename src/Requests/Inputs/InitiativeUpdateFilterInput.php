<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeUpdateFilter */
class InitiativeUpdateFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UserFilterInput $user = null,
		public ?InitiativeFilterInput $initiative = null,
		public ?ReactionCollectionFilterInput $reactions = null,
		/** @var iterable<InitiativeUpdateFilterInput>|Collection<int, InitiativeUpdateFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeUpdateFilterInput>|Collection<int, InitiativeUpdateFilterInput> */
		public ?iterable $or = null
	) {
	}
}
