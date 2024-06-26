<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class DocumentCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $title = null,
		public ?StringComparatorInput $slugId = null,
		public ?UserFilterInput $creator = null,
		public ?ProjectFilterInput $project = null,
		/** @var iterable<DocumentCollectionFilterInput>|Collection<int, DocumentCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<DocumentCollectionFilterInput>|Collection<int, DocumentCollectionFilterInput> */
		public ?iterable $or = null,
		public ?DocumentFilterInput $some = null,
		public ?DocumentFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
