<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<AgentActivity>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentActivityConnection
 */
class AgentActivityConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, AgentActivityEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, AgentActivity> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
