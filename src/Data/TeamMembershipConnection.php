<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamMembershipConnection extends Data
{
	function __construct(
		/** @var Collection<int, TeamMembershipEdge> */
		public Collection $edges,
		/** @var Collection<int, TeamMembership> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
