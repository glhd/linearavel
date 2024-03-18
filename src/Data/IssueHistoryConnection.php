<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<IssueHistory> */
class IssueHistoryConnection extends Connection
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
