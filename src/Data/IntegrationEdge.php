<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationEdge extends Data
{
	public function __construct(public Optional|Integration $node, public Optional|string $cursor)
	{
	}
}
