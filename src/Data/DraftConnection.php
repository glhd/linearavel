<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Draft>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DraftConnection
 */
class DraftConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, DraftEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Draft> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
