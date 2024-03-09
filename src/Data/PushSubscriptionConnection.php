<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PushSubscriptionConnection extends Data
{
	function __construct(
		/** @var Collection<int, PushSubscriptionEdge> */
		public Collection $edges,
		/** @var Collection<int, PushSubscription> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
