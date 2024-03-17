<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

class OauthClientConnection extends Connection
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
