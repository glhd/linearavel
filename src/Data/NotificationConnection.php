<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Notification>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationConnection
 */
class NotificationConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, NotificationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Notification> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
