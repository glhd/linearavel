<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateInteractionConnection extends Data
{
	public function __construct(
		/** @var Collection<int, ProjectUpdateInteractionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectUpdateInteraction> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
