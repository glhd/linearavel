<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CompanyEdge extends Data
{
	function __construct(public Optional|Company $node, public Optional|string $cursor)
	{
	}
}
