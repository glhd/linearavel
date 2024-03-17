<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OauthClientConnection extends Data
{
	public function __construct(
		/** @var Collection<int, OauthClientEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, OauthClient> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
