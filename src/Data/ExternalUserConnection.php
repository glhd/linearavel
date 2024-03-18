<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<ExternalUser> */
class ExternalUserConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ExternalUserEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ExternalUser> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
