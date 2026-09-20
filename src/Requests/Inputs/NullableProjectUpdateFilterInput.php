<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableProjectUpdateFilter */
class NullableProjectUpdateFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UserFilterInput $user = null,
		public ?ProjectFilterInput $project = null,
		public ?ReactionCollectionFilterInput $reactions = null,
		public ?bool $null = null,
		/** @var iterable<NullableProjectUpdateFilterInput>|Collection<int, NullableProjectUpdateFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableProjectUpdateFilterInput>|Collection<int, NullableProjectUpdateFilterInput> */
		public ?iterable $or = null
	) {
	}
}
