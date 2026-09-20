<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<IssueToRelease>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueToReleaseConnection
 */
class IssueToReleaseConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, IssueToReleaseEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueToRelease> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
