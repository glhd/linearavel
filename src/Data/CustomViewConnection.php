<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<CustomView>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomViewConnection
 */
class CustomViewConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, CustomViewEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, CustomView> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
