<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FacetEdge extends Data
{
	public function __construct(public Optional|Facet $node, public Optional|string $cursor)
	{
	}
}
