<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationTemplateConnection extends Data
{
	function __construct(
		/** @var Collection<int, IntegrationTemplateEdge> */
		public Collection $edges,
		/** @var Collection<int, IntegrationTemplate> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
