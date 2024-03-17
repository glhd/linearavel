<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ApiKeyEdge extends Data
{
	public function __construct(public Optional|ApiKey $node, public Optional|string $cursor)
	{
	}
}
