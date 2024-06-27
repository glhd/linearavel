<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<NotificationSubscription>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationSubscriptionConnection
 */
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
