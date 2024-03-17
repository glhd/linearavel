<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class AttachmentFilter
{
	public function __construct(
		/** @var iterable<AttachmentFilter>|Collection<int, AttachmentFilter> */
		public iterable $and,
		/** @var iterable<AttachmentFilter>|Collection<int, AttachmentFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $title = null,
		public ?NullableStringComparator $subtitle = null,
		public ?StringComparator $url = null,
		public ?NullableUserFilter $creator = null,
		public ?SourceTypeComparator $sourceType = null
	) {
	}
}
