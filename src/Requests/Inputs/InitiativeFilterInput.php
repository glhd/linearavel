<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class InitiativeFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $slugId = null,
		public ?UserFilterInput $creator = null,
		/** @var iterable<InitiativeFilterInput>|Collection<int, InitiativeFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeFilterInput>|Collection<int, InitiativeFilterInput> */
		public ?iterable $or = null
	) {
	}
}
