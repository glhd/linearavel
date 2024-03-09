<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationEdge extends Data
{
	function __construct(public Optional|Integration $node, public Optional|string $cursor)
	{
	}
}
