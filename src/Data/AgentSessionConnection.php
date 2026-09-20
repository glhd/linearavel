<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<AgentSession>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSessionConnection
 */
class AgentSessionConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, AgentSessionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, AgentSession> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
