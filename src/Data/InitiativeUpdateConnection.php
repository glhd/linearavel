<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<InitiativeUpdate>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/InitiativeUpdateConnection
 */
class InitiativeUpdateConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, InitiativeUpdateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, InitiativeUpdate> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
