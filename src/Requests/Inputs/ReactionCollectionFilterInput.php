<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReactionCollectionFilter */
class ReactionCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $emoji = null,
		public ?IDComparatorInput $customEmojiId = null,
		/** @var iterable<ReactionCollectionFilterInput>|Collection<int, ReactionCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<ReactionCollectionFilterInput>|Collection<int, ReactionCollectionFilterInput> */
		public ?iterable $or = null,
		public ?ReactionFilterInput $some = null,
		public ?ReactionFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
