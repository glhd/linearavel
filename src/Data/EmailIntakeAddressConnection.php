<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<EmailIntakeAddress>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/EmailIntakeAddressConnection
 */
class EmailIntakeAddressConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, EmailIntakeAddressEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, EmailIntakeAddress> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
