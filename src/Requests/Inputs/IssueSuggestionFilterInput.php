<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueSuggestionFilter */
class IssueSuggestionFilterInput
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
		/** @var iterable<IssueSuggestionFilterInput>|Collection<int, IssueSuggestionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<IssueSuggestionFilterInput>|Collection<int, IssueSuggestionFilterInput> */
		public ?iterable $or = null
	) {
	}
}
