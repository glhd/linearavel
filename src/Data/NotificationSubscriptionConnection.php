<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

class NotificationSubscriptionConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, NotificationSubscriptionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, NotificationSubscription> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
