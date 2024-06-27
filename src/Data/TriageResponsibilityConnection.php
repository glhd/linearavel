<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<TriageResponsibility>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/TriageResponsibilityConnection
 */
class TriageResponsibilityConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, TriageResponsibilityEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, TriageResponsibility> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
