<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PushSubscriptionConnection extends Data
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
