<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationsSettingsConnection extends Data
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
