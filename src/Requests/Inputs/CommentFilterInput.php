<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CommentFilter */
class CommentFilterInput
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
		/** @var iterable<CommentFilterInput>|Collection<int, CommentFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<CommentFilterInput>|Collection<int, CommentFilterInput> */
		public ?iterable $or = null
	) {
	}
}
