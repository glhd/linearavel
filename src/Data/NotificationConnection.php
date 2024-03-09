<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationConnection extends Data
{
	function __construct(
		/** @var Collection<int, NotificationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Notification> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
