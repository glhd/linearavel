<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<CustomerNeed>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomerNeedConnection
 */
class CustomerNeedConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, CustomerNeedEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, CustomerNeed> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
