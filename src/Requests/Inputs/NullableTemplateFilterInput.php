<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableTemplateFilter */
class NullableTemplateFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?bool $null = null,
		/** @var iterable<NullableTemplateFilterInput>|Collection<int, NullableTemplateFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableTemplateFilterInput>|Collection<int, NullableTemplateFilterInput> */
		public ?iterable $or = null
	) {
	}
}
