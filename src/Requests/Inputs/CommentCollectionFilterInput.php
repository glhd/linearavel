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
		public ?IssueFilterInput $issue = null,
		public ?ProjectUpdateFilterInput $projectUpdate = null,
		public ?DocumentContentFilterInput $documentContent = null,
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
