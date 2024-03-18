<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<IssueRelation> */
class IssueRelationConnection extends Connection
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
