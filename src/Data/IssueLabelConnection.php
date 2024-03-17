<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueLabelConnection extends Data
{
	public function __construct(
		/** @var Collection<int, IssueLabelEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}