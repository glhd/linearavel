<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<DocumentSearchResult> */
class DocumentSearchResultConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, DocumentSearchResultEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, DocumentSearchResult> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
