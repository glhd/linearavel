<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueSearchPayload */
class IssueSearchPayload extends Data
{
	public function __construct(
		/** @var Collection<int, IssueSearchResultEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueSearchResult> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo,
		public Optional|ArchiveResponse $archivePayload,
		public Optional|float $totalCount
	) {
	}
}
