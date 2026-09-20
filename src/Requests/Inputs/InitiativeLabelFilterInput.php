<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeLabelFilter */
class InitiativeLabelFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?BooleanComparatorInput $isGroup = null,
		public ?NullableUserFilterInput $creator = null,
		public ?InitiativeLabelFilterInput $parent = null,
		/** @var iterable<InitiativeLabelFilterInput>|Collection<int, InitiativeLabelFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeLabelFilterInput>|Collection<int, InitiativeLabelFilterInput> */
		public ?iterable $or = null
	) {
	}
}
