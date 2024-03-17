<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectConnection extends Data
{
	public function __construct(
		/** @var Collection<int, ProjectEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Project> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
