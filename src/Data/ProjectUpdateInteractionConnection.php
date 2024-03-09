<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateInteractionConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectUpdateInteractionEdge> */
		public Collection $edges,
		/** @var Collection<int, ProjectUpdateInteraction> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
