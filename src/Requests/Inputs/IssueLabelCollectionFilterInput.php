<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IssueLabelCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?NullableUserFilterInput $creator = null,
		public ?NullableTeamFilterInput $team = null,
		public ?IssueLabelFilterInput $parent = null,
		/** @var iterable<IssueLabelCollectionFilterInput>|Collection<int, IssueLabelCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<IssueLabelCollectionFilterInput>|Collection<int, IssueLabelCollectionFilterInput> */
		public ?iterable $or = null,
		public ?IssueLabelFilterInput $some = null,
		public ?IssueLabelFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
