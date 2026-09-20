<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<IssueStateSpan>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueStateSpanConnection
 */
class IssueStateSpanConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, IssueStateSpanEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IssueStateSpan> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
