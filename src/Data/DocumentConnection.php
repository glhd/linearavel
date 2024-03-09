<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentConnection extends Data
{
	function __construct(
		/** @var Collection<int, DocumentEdge> */
		public Collection $edges,
		/** @var Collection<int, Document> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}