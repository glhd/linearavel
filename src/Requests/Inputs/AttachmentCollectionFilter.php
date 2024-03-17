<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class AttachmentCollectionFilter
{
	public function __construct(
		/** @var iterable<AttachmentCollectionFilter>|Collection<int, AttachmentCollectionFilter> */
		public iterable $and,
		/** @var iterable<AttachmentCollectionFilter>|Collection<int, AttachmentCollectionFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $title = null,
		public ?NullableStringComparator $subtitle = null,
		public ?StringComparator $url = null,
		public ?NullableUserFilter $creator = null,
		public ?SourceTypeComparator $sourceType = null,
		public ?AttachmentFilter $some = null,
		public ?AttachmentFilter $every = null,
		public ?NumberComparator $length = null
	) {
	}
}
