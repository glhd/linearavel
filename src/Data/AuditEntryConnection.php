<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuditEntryConnection extends Data
{
	function __construct(
		/** @var Collection<int, AuditEntryEdge> */
		public Collection $edges,
		/** @var Collection<int, AuditEntry> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
