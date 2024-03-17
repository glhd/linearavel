<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InitiativeToProjectConnection extends Data
{
	public function __construct(
		/** @var Collection<int, InitiativeToProjectEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, InitiativeToProject> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
