<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationSubscriptionConnection extends Data
{
	function __construct(
		/** @var Collection<int, NotificationSubscriptionEdge> */
		public Collection $edges,
		/** @var Collection<int, NotificationSubscription> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}