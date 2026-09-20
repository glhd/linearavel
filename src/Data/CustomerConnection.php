<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Customer>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomerConnection
 */
class CustomerConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, CustomerEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Customer> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
