<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeCollectionFilter */
class InitiativeCollectionFilterInput
{
	public function __construct(
		public ?EntityIdentifierIDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slugId = null,
		public ?NullableStringComparatorInput $customIdentifier = null,
		public ?NullableUserFilterInput $creator = null,
		public ?StringComparatorInput $status = null,
		public ?NullableNumberComparatorInput $priority = null,
		public ?TeamCollectionFilterInput $teams = null,
		public ?NullableTeamFilterInput $leadTeam = null,
		public ?NullableUserFilterInput $owner = null,
		public ?NullableDateComparatorInput $targetDate = null,
		public ?NullableDateComparatorInput $startedAt = null,
		public ?NullableDateComparatorInput $completedAt = null,
		public ?NullableDateComparatorInput $canceledAt = null,
		public ?StringComparatorInput $health = null,
		public ?StringComparatorInput $healthWithAge = null,
		public ?StringComparatorInput $activityType = null,
		public ?InitiativeCollectionFilterInput $ancestors = null,
		public ?InitiativeLabelCollectionFilterInput $labels = null,
		public ?ProjectCollectionFilterInput $projects = null,
		public ?InitiativeUpdatesCollectionFilterInput $initiativeUpdates = null,
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
