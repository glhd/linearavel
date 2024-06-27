<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Cycle>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CycleConnection
 */
class CycleConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, CycleEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Cycle> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
