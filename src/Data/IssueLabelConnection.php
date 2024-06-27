<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<IssueLabel>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueLabelConnection
 */
class IssueLabelConnection extends Connection
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
