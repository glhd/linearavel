<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationTemplateConnection extends Data
{
	public function __construct(
		/** @var Collection<int, IntegrationTemplateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IntegrationTemplate> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
