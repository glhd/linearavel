<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OauthClientConnection extends Data
{
	function __construct(
		/** @var Collection<int, OauthClientEdge> */
		public Collection $edges,
		/** @var Collection<int, OauthClient> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
