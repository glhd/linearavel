<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

class TriageResponsibilityConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, TriageResponsibilityEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, TriageResponsibility> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
