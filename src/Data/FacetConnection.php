<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FacetConnection extends Data
{
	function __construct(
		/** @var Collection<int, FacetEdge> */
		public Collection $edges,
		/** @var Collection<int, Facet> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
