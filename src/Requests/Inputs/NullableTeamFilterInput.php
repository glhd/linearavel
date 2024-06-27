<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NullableTeamFilter */
class NullableTeamFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $key = null,
		public ?NullableStringComparatorInput $description = null,
		public ?IssueCollectionFilterInput $issues = null,
		public ?bool $null = null,
		/** @var iterable<NullableTeamFilterInput>|Collection<int, NullableTeamFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NullableTeamFilterInput>|Collection<int, NullableTeamFilterInput> */
		public ?iterable $or = null
	) {
	}
}
