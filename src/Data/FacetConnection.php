<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Facet>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/FacetConnection
 */
class FacetConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, FacetEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Facet> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
