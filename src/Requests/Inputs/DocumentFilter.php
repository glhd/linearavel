<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class DocumentFilter
{
	public function __construct(
		/** @var iterable<DocumentFilter>|Collection<int, DocumentFilter> */
		public iterable $and,
		/** @var iterable<DocumentFilter>|Collection<int, DocumentFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $title = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		public ?ProjectFilter $project = null
	) {
	}
}
