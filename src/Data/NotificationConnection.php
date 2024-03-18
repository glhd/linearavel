<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<Notification> */
class NotificationConnection extends Connection
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
