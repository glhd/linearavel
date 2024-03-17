<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationConnection extends Data
{
	public function __construct(
		/** @var Collection<int, IntegrationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Integration> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
