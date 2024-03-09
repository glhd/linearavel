<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ReactionConnection extends Data
{
	function __construct(
		/** @var Collection<int, ReactionEdge> */
		public Collection $edges,
		/** @var Collection<int, Reaction> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
