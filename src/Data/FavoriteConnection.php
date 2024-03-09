<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FavoriteConnection extends Data
{
	function __construct(
		/** @var Collection<int, FavoriteEdge> */
		public Collection $edges,
		/** @var Collection<int, Favorite> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}