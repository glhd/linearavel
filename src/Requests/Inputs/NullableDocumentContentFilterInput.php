<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableDocumentContentFilter */
class NullableDocumentContentFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?NullableStringComparatorInput $content = null,
		public ?ProjectFilterInput $project = null,
		public ?InitiativeFilterInput $initiative = null,
		public ?IssueFilterInput $issue = null,
		public ?DocumentFilterInput $document = null,
		public ?ProjectMilestoneFilterInput $projectMilestone = null,
		public ?bool $null = null,
		/** @var iterable<NullableDocumentContentFilterInput>|Collection<int, NullableDocumentContentFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableDocumentContentFilterInput>|Collection<int, NullableDocumentContentFilterInput> */
		public ?iterable $or = null
	) {
	}
}
