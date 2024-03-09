<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InitiativeConnection extends Data
{
	function __construct(
		/** @var Collection<int, InitiativeEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Initiative> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
