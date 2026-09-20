<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<UsageAlert>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/UsageAlertConnection
 */
class UsageAlertConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, UsageAlertEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, UsageAlert> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
