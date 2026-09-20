<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueSuggestionCollectionFilter */
class IssueSuggestionCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $type = null,
		public ?StringComparatorInput $state = null,
		public ?NullableUserFilterInput $suggestedUser = null,
		public ?NullableProjectFilterInput $suggestedProject = null,
		public ?NullableTeamFilterInput $suggestedTeam = null,
		public ?IssueLabelFilterInput $suggestedLabel = null,
		/** @var iterable<IssueSuggestionCollectionFilterInput>|Collection<int, IssueSuggestionCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<IssueSuggestionCollectionFilterInput>|Collection<int, IssueSuggestionCollectionFilterInput> */
		public ?iterable $or = null,
		public ?IssueSuggestionFilterInput $some = null,
		public ?IssueSuggestionFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
