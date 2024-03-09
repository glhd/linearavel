<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectLinkConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectLinkEdge> */
		public Collection $edges,
		/** @var Collection<int, ProjectLink> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
