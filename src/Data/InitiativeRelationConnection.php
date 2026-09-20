<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<InitiativeRelation>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/InitiativeRelationConnection
 */
class InitiativeRelationConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, InitiativeRelationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, InitiativeRelation> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
