<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectUpdateEdge> */
		public Collection $edges,
		/** @var Collection<int, ProjectUpdate> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
