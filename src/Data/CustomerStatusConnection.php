<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<CustomerStatus>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomerStatusConnection
 */
class CustomerStatusConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, CustomerStatusEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, CustomerStatus> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
