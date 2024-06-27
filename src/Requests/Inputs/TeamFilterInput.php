<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamFilter */
class TeamFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $key = null,
		public ?NullableStringComparatorInput $description = null,
		public ?IssueCollectionFilterInput $issues = null,
		/** @var iterable<TeamFilterInput>|Collection<int, TeamFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<TeamFilterInput>|Collection<int, TeamFilterInput> */
		public ?iterable $or = null
	) {
	}
}
