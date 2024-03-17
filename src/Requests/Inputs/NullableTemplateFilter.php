<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableTemplateFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?bool $null = null,
		/** @var iterable<NullableTemplateFilter>|Collection<int, NullableTemplateFilter> */
		public ?iterable $and = null,
		/** @var iterable<NullableTemplateFilter>|Collection<int, NullableTemplateFilter> */
		public ?iterable $or = null
	) {
	}
}
