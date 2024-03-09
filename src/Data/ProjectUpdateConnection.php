<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectUpdateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectUpdate> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
