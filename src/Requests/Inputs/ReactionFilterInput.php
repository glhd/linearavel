<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReactionFilter */
class ReactionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $emoji = null,
		public ?IDComparatorInput $customEmojiId = null,
		/** @var iterable<ReactionFilterInput>|Collection<int, ReactionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReactionFilterInput>|Collection<int, ReactionFilterInput> */
		public ?iterable $or = null
	) {
	}
}
