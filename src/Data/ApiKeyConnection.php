<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ApiKeyConnection extends Data
{
	function __construct(
		/** @var Collection<int, ApiKeyEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ApiKey> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
