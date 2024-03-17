<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuditEntryConnection extends Data
{
	public function __construct(
		/** @var Collection<int, AuditEntryEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, AuditEntry> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
