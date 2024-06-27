<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ApiKey>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ApiKeyConnection
 */
class ApiKeyConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ApiKeyEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ApiKey> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
