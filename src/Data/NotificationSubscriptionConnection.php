<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationSubscriptionConnection extends Data
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
