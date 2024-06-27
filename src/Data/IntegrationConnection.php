<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Integration>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IntegrationConnection
 */
class IntegrationConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, IntegrationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Integration> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
