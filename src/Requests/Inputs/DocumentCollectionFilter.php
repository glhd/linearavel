<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class DocumentCollectionFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $title = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		public ?ProjectFilter $project = null,
		/** @var iterable<DocumentCollectionFilter>|Collection<int, DocumentCollectionFilter> */
		public ?iterable $and = null,
		/** @var iterable<DocumentCollectionFilter>|Collection<int, DocumentCollectionFilter> */
		public ?iterable $or = null,
		public ?DocumentFilter $some = null,
		public ?DocumentFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
