<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ReleaseStage>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ReleaseStageConnection
 */
class ReleaseStageConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ReleaseStageEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ReleaseStage> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
