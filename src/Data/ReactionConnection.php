<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<Reaction> */
class ReactionConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ReactionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Reaction> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
