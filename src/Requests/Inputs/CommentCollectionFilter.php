<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class CommentCollectionFilter
{
	public function __construct(
		/** @var iterable<CommentCollectionFilter>|Collection<int, CommentCollectionFilter> */
		public iterable $and,
		/** @var iterable<CommentCollectionFilter>|Collection<int, CommentCollectionFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $body = null,
		public ?UserFilter $user = null,
		public ?IssueFilter $issue = null,
		public ?ProjectUpdateFilter $projectUpdate = null,
		public ?DocumentContentFilter $documentContent = null,
		public ?CommentFilter $some = null,
		public ?CommentFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
