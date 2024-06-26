<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TeamCollectionFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		/** @var iterable<TeamCollectionFilterInput>|Collection<int, TeamCollectionFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<TeamCollectionFilterInput>|Collection<int, TeamCollectionFilterInput> */
		public ?iterable $or = null,
		public ?TeamFilterInput $some = null,
		public ?TeamFilterInput $every = null,
		public ?NumberComparatorInput $length = null
	) {
	}
}
