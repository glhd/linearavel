<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueHistoryConnection extends Data
{
	public function __construct(
		/** @var Collection<int, IssueHistoryEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueHistory> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
