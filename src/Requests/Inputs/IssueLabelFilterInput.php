<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueLabelFilter */
class IssueLabelFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?NullableUserFilterInput $creator = null,
		public ?NullableTeamFilterInput $team = null,
		public ?IssueLabelFilterInput $parent = null,
		/** @var iterable<IssueLabelFilterInput>|Collection<int, IssueLabelFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<IssueLabelFilterInput>|Collection<int, IssueLabelFilterInput> */
		public ?iterable $or = null
	) {
	}
}
