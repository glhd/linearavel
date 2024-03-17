<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentSearchPayload extends Data
{
	public function __construct(
		/** @var Collection<int, DocumentSearchResultEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, DocumentSearchResult> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo,
		public Optional|ArchiveResponse $archivePayload,
		public Optional|float $totalCount
	) {
	}
}
