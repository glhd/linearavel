<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/FeedItemFilter */
class FeedItemFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?UserFilterInput $author = null,
		public ?StringComparatorInput $updateType = null,
		public ?StringComparatorInput $updateHealth = null,
		public ?ProjectUpdateFilterInput $projectUpdate = null,
		public ?InitiativeCollectionFilterInput $relatedInitiatives = null,
		public ?TeamCollectionFilterInput $relatedTeams = null,
		/** @var iterable<FeedItemFilterInput>|Collection<int, FeedItemFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<FeedItemFilterInput>|Collection<int, FeedItemFilterInput> */
		public ?iterable $or = null
	) {
	}
}
