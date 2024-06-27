<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<TeamMembership>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/TeamMembershipConnection
 */
class TeamMembershipConnection extends Connection
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
