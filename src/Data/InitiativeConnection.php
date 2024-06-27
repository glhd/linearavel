<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Initiative>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/InitiativeConnection
 */
class InitiativeConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, InitiativeEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Initiative> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
