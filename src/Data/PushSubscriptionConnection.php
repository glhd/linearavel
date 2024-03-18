<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<PushSubscription> */
class PushSubscriptionConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, PushSubscriptionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, PushSubscription> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
