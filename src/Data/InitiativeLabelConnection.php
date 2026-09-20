<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<InitiativeLabel>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/InitiativeLabelConnection
 */
class InitiativeLabelConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, InitiativeLabelEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, InitiativeLabel> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
