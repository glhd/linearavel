<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<GitAutomationState>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitAutomationStateConnection
 */
class GitAutomationStateConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, GitAutomationStateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, GitAutomationState> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
