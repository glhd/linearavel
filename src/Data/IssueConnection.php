<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Issue>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueConnection
 */
class IssueConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, IssueEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Issue> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
