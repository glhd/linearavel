<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class AttachmentFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $title = null,
		public ?NullableStringComparator $subtitle = null,
		public ?StringComparator $url = null,
		public ?NullableUserFilter $creator = null,
		public ?SourceTypeComparator $sourceType = null,
		/** @var iterable<AttachmentFilter>|Collection<int, AttachmentFilter> */
		public ?iterable $and = null,
		/** @var iterable<AttachmentFilter>|Collection<int, AttachmentFilter> */
		public ?iterable $or = null
	) {
	}
}
