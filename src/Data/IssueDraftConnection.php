<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<IssueDraft>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueDraftConnection
 */
class IssueDraftConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, IssueDraftEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueDraft> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
