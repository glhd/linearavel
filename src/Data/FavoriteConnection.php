<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FavoriteConnection extends Data
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
