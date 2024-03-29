<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectEdge extends Data
{
	public function __construct(public Optional|Project $node, public Optional|string $cursor)
	{
	}
}
