<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<InitiativeToProject>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/InitiativeToProjectConnection
 */
class InitiativeToProjectConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, InitiativeToProjectEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, InitiativeToProject> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
