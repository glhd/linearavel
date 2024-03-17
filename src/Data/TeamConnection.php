<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamConnection extends Data
{
	public function __construct(
		/** @var Collection<int, TeamEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Team> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
