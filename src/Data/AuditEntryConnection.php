<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<AuditEntry> */
class AuditEntryConnection extends Connection
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
