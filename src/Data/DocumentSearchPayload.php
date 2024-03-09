<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentSearchPayload extends Data
{
	function __construct(
		/** @var Collection<int, DocumentSearchResultEdge> */
		public Collection $edges,
		/** @var Collection<int, DocumentSearchResult> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo,
		public Optional|ArchiveResponse $archivePayload,
		public Optional|float $totalCount
	) {
	}
}