<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateEdge extends Data
{
	public function __construct(public Optional|ProjectUpdate $node, public Optional|string $cursor)
	{
	}
}
