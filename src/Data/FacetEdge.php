<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/FacetEdge */
class FacetEdge extends Data
{
	public function __construct(public Optional|Facet $node, public Optional|string $cursor)
	{
	}
}
