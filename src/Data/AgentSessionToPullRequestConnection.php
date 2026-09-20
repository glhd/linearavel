<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<AgentSessionToPullRequest>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSessionToPullRequestConnection
 */
class AgentSessionToPullRequestConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, AgentSessionToPullRequestEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, AgentSessionToPullRequest> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
