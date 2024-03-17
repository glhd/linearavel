<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class InitiativeFilter
{
	public function __construct(
		/** @var iterable<InitiativeFilter>|Collection<int, InitiativeFilter> */
		public iterable $and,
		/** @var iterable<InitiativeFilter>|Collection<int, InitiativeFilter> */
		public iterable $or,
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $slugId = null,
		public ?UserFilter $creator = null
	) {
	}
}
