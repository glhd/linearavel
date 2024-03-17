<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FacetConnection extends Data
{
	public function __construct(
		/** @var Collection<int, FacetEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Facet> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
