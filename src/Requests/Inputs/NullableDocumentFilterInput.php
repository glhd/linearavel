<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableDocumentFilter */
class NullableDocumentFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $title = null,
		public ?ContentComparatorInput $searchableContent = null,
		public ?StringComparatorInput $slugId = null,
		public ?UserFilterInput $creator = null,
		public ?NullableUserFilterInput $owner = null,
		public ?ProjectFilterInput $project = null,
		public ?IssueFilterInput $issue = null,
		public ?InitiativeFilterInput $initiative = null,
		public ?NullableTeamFilterInput $team = null,
		public ?CycleFilterInput $cycle = null,
		public ?ReleaseFilterInput $release = null,
		public ?NullableDocumentFilterInput $parentDocument = null,
		public ?NullableUserFilterInput $personalUser = null,
		public ?bool $null = null,
		/** @var iterable<NullableDocumentFilterInput>|Collection<int, NullableDocumentFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableDocumentFilterInput>|Collection<int, NullableDocumentFilterInput> */
		public ?iterable $or = null
	) {
	}
}
