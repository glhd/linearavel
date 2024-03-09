<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueSearchPayload extends Data
{
	function __construct(
		/** @var Collection<int, IssueSearchResultEdge> */
		public Collection $edges,
		/** @var Collection<int, IssueSearchResult> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo,
		public Optional|ArchiveResponse $archivePayload,
		public Optional|float $totalCount
	) {
	}
}