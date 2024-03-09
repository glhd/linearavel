<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationConnection extends Data
{
	function __construct(
		/** @var Collection<int, IntegrationEdge> */
		public Collection $edges,
		/** @var Collection<int, Integration> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
