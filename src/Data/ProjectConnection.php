<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectEdge> */
		public Collection $edges,
		/** @var Collection<int, Project> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
