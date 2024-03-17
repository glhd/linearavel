<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

class IntegrationTemplateConnection extends Connection
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
