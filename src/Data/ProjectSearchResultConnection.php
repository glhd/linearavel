<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectSearchResultConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectSearchResultEdge> */
		public Collection $edges,
		/** @var Collection<int, ProjectSearchResult> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
