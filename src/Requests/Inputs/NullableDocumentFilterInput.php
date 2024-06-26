<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableDocumentFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $title = null,
		public ?StringComparatorInput $slugId = null,
		public ?UserFilterInput $creator = null,
		public ?ProjectFilterInput $project = null,
		public ?bool $null = null,
		/** @var iterable<NullableDocumentFilterInput>|Collection<int, NullableDocumentFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableDocumentFilterInput>|Collection<int, NullableDocumentFilterInput> */
		public ?iterable $or = null
	) {
	}
}
