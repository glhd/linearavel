<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableInitiativeUpdateFilter */
class NullableInitiativeUpdateFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UserFilterInput $user = null,
		public ?InitiativeFilterInput $initiative = null,
		public ?ReactionCollectionFilterInput $reactions = null,
		public ?bool $null = null,
		/** @var iterable<NullableInitiativeUpdateFilterInput>|Collection<int, NullableInitiativeUpdateFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableInitiativeUpdateFilterInput>|Collection<int, NullableInitiativeUpdateFilterInput> */
		public ?iterable $or = null
	) {
	}
}
