<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CommentCollectionFilter */
class CommentCollectionFilterInput
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
		/** @var iterable<CommentCollectionFilterInput>|Collection<int, CommentCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<CommentCollectionFilterInput>|Collection<int, CommentCollectionFilterInput> */
		public ?iterable $or = null,
		public ?CommentFilterInput $some = null,
		public ?CommentFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
