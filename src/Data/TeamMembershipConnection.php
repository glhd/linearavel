<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamMembershipConnection extends Data
{
	public function __construct(
		/** @var Collection<int, TeamMembershipEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, TeamMembership> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
