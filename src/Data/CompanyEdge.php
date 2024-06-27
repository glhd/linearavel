<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CompanyEdge */
class CompanyEdge extends Data
{
	public function __construct(public Optional|Company $node, public Optional|string $cursor)
	{
	}
}
