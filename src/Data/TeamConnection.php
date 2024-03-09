<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamConnection extends Data
{
	function __construct(
		/** @var Collection<int, TeamEdge> */
		public Collection $edges,
		/** @var Collection<int, Team> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
