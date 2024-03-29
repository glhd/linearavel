<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class CommentFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $body = null,
		public ?UserFilter $user = null,
		public ?IssueFilter $issue = null,
		public ?ProjectUpdateFilter $projectUpdate = null,
		public ?DocumentContentFilter $documentContent = null,
		/** @var iterable<CommentFilter>|Collection<int, CommentFilter> */
		public ?iterable $and = null,
		/** @var iterable<CommentFilter>|Collection<int, CommentFilter> */
		public ?iterable $or = null
	) {
	}
}
