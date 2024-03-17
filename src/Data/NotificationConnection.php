<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationConnection extends Data
{
	public function __construct(
		/** @var Collection<int, NotificationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Notification> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
