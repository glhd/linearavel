<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class InitiativeFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null,
		/** @var iterable<InitiativeFilter>|Collection<int, InitiativeFilter> */
		public ?iterable $and = null,
		/** @var iterable<InitiativeFilter>|Collection<int, InitiativeFilter> */
		public ?iterable $or = null
	) {
	}
}
