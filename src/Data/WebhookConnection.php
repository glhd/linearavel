<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Webhook>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/WebhookConnection
 */
class WebhookConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, WebhookEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Webhook> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
