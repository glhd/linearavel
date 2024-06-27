<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AttachmentCollectionFilter */
class AttachmentCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $title = null,
		public ?NullableStringComparatorInput $subtitle = null,
		public ?StringComparatorInput $url = null,
		public ?NullableUserFilterInput $creator = null,
		public ?SourceTypeComparatorInput $sourceType = null,
		/** @var iterable<AttachmentCollectionFilterInput>|Collection<int, AttachmentCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<AttachmentCollectionFilterInput>|Collection<int, AttachmentCollectionFilterInput> */
		public ?iterable $or = null,
		public ?AttachmentFilterInput $some = null,
		public ?AttachmentFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
