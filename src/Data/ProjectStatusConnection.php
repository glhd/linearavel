<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectStatusConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectStatusEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectStatus> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
