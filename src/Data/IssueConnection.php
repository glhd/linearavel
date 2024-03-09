<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueConnection extends Data
{
	function __construct(
		/** @var Collection<int, IssueEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Issue> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
