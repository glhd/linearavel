<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableCommentFilter */
class NullableCommentFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $body = null,
		public ?UserFilterInput $user = null,
		public ?NullableIssueFilterInput $issue = null,
		public ?NullableProjectUpdateFilterInput $projectUpdate = null,
		public ?NullableInitiativeUpdateFilterInput $initiativeUpdate = null,
		public ?NullableCommentFilterInput $parent = null,
		public ?NullableDocumentContentFilterInput $documentContent = null,
		public ?NullableProjectFilterInput $project = null,
		public ?NullableInitiativeFilterInput $initiative = null,
		public ?ReactionCollectionFilterInput $reactions = null,
		public ?CustomerNeedCollectionFilterInput $needs = null,
		public ?bool $null = null,
		/** @var iterable<NullableCommentFilterInput>|Collection<int, NullableCommentFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableCommentFilterInput>|Collection<int, NullableCommentFilterInput> */
		public ?iterable $or = null
	) {
	}
}
