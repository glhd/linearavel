<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class CommentFilter
{
	public function __construct(
		/** @var Collection<int, CommentFilter> */
		public Collection $and,
		/** @var Collection<int, CommentFilter> */
		public Collection $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $body = null,
		public ?UserFilter $user = null,
		public ?IssueFilter $issue = null,
		public ?ProjectUpdateFilter $projectUpdate = null,
		public ?DocumentContentFilter $documentContent = null
	) {
	}
}
