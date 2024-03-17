<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

class ApiKeyConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ApiKeyEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ApiKey> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
