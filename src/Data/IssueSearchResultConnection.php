<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueSearchResultConnection extends Data
{
	function __construct(
		/** @var Collection<int, IssueSearchResultEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueSearchResult> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
