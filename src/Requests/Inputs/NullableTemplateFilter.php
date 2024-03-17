<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableTemplateFilter
{
	public function __construct(
		/** @var iterable<NullableTemplateFilter>|Collection<int, NullableTemplateFilter> */
		public iterable $and,
		/** @var iterable<NullableTemplateFilter>|Collection<int, NullableTemplateFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?bool $null = null
	) {
	}
}
