<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<IssueSearchResult>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueSearchResultConnection
 */
class IssueSearchResultConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, IssueSearchResultEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueSearchResult> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
