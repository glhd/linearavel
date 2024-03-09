<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InitiativeToProjectConnection extends Data
{
	function __construct(
		/** @var Collection<int, InitiativeToProjectEdge> */
		public Collection $edges,
		/** @var Collection<int, InitiativeToProject> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
