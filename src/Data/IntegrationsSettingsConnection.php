<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationsSettingsConnection extends Data
{
	function __construct(
		/** @var Collection<int, IntegrationsSettingsEdge> */
		public Collection $edges,
		/** @var Collection<int, IntegrationsSettings> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
