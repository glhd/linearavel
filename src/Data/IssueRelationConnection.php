<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueRelationConnection extends Data
{
	public function __construct(
		/** @var Collection<int, IssueRelationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueRelation> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
