<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ExternalUserConnection extends Data
{
	public function __construct(
		/** @var Collection<int, ExternalUserEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ExternalUser> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
