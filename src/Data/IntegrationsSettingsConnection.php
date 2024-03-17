<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

class IntegrationsSettingsConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, IntegrationsSettingsEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, IntegrationsSettings> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
