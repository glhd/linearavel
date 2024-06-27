<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Favorite>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/FavoriteConnection
 */
class FavoriteConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, FavoriteEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Favorite> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
