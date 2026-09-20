<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TemplateFilter */
class TemplateFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $type = null,
		public ?IDComparatorInput $inheritedFromId = null,
		public ?NullableTeamFilterInput $team = null,
		/** @var iterable<TemplateFilterInput>|Collection<int, TemplateFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<TemplateFilterInput>|Collection<int, TemplateFilterInput> */
		public ?iterable $or = null
	) {
	}
}
