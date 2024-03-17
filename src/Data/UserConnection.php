<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserConnection extends Data
{
	public function __construct(
		/** @var Collection<int, UserEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, User> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
