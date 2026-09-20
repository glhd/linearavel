<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomerStatusEdge */
class CustomerStatusEdge extends Data
{
	public function __construct(public Optional|CustomerStatus $node, public Optional|string $cursor)
	{
	}
}
