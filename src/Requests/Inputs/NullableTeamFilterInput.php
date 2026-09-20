<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableTeamFilter */
class NullableTeamFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $key = null,
		public ?NullableStringComparatorInput $description = null,
		public ?BooleanComparatorInput $private = null,
		public ?TeamVisibilityComparatorInput $visibility = null,
		public ?UserCollectionFilterInput $members = null,
		public ?UserCollectionFilterInput $users = null,
		public ?UserCollectionFilterInput $owners = null,
		public ?NullableDateComparatorInput $retiredAt = null,
		public ?IssueCollectionFilterInput $issues = null,
		public ?NullableTeamFilterInput $parent = null,
		public ?TeamCollectionFilterInput $ancestors = null,
		public ?NullableTeamFilterInput $restrictedBy = null,
		public ?ReleasePipelineCollectionFilterInput $releasePipelines = null,
		public ?bool $null = null,
		/** @var iterable<NullableTeamFilterInput>|Collection<int, NullableTeamFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableTeamFilterInput>|Collection<int, NullableTeamFilterInput> */
		public ?iterable $or = null
	) {
	}
}
