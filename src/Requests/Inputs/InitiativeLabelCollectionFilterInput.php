<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeLabelCollectionFilter */
class InitiativeLabelCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?BooleanComparatorInput $isGroup = null,
		public ?NullableUserFilterInput $creator = null,
		public ?InitiativeLabelFilterInput $parent = null,
		public ?bool $null = null,
		/** @var iterable<InitiativeLabelCollectionFilterInput>|Collection<int, InitiativeLabelCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeLabelCollectionFilterInput>|Collection<int, InitiativeLabelCollectionFilterInput> */
		public ?iterable $or = null,
		public ?InitiativeLabelCollectionFilterInput $some = null,
		public ?InitiativeLabelFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
