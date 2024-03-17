<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class DocumentCollectionFilter
{
	public function __construct(
		/** @var iterable<DocumentCollectionFilter>|Collection<int, DocumentCollectionFilter> */
		public iterable $and,
		/** @var iterable<DocumentCollectionFilter>|Collection<int, DocumentCollectionFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $title = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		public ?ProjectFilter $project = null,
		public ?DocumentFilter $some = null,
		public ?DocumentFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
