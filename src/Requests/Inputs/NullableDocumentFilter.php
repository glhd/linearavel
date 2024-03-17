<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableDocumentFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $title = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		public ?ProjectFilter $project = null,
		public ?bool $null = null,
		/** @var iterable<NullableDocumentFilter>|Collection<int, NullableDocumentFilter> */
		public ?iterable $and = null,
		/** @var iterable<NullableDocumentFilter>|Collection<int, NullableDocumentFilter> */
		public ?iterable $or = null
	) {
	}
}
