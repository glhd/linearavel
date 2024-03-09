<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueRelationConnection extends Data
{
	function __construct(
		/** @var Collection<int, IssueRelationEdge> */
		public Collection $edges,
		/** @var Collection<int, IssueRelation> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
