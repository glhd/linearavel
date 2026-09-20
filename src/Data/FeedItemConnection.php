<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<FeedItem>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/FeedItemConnection
 */
class FeedItemConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, FeedItemEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, FeedItem> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
