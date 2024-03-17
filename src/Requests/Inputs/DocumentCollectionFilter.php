<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class DocumentCollectionFilter
{
	public function __construct(
		/** @var Collection<int, DocumentCollectionFilter> */
		public Collection $and,
		/** @var Collection<int, DocumentCollectionFilter> */
		public Collection $or,
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
