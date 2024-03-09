<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueHistoryConnection extends Data
{
	function __construct(
		/** @var Collection<int, IssueHistoryEdge> */
		public Collection $edges,
		/** @var Collection<int, IssueHistory> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
