<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Team>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/TeamConnection
 */
class TeamConnection extends Connection
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
