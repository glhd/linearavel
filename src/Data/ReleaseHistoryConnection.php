<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ReleaseHistory>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ReleaseHistoryConnection
 */
class ReleaseHistoryConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ReleaseHistoryEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ReleaseHistory> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
