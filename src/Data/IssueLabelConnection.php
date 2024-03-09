<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueLabelConnection extends Data
{
	function __construct(
		/** @var Collection<int, IssueLabelEdge> */
		public Collection $edges,
		/** @var Collection<int, IssueLabel> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
