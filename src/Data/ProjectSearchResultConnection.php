<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

class ProjectSearchResultConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectSearchResultEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectSearchResult> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
