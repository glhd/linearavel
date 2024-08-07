<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<OauthClient>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OauthClientConnection
 */
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
