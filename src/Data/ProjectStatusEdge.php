<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectStatusEdge extends Data
{
	public function __construct(public Optional|ProjectStatus $node, public Optional|string $cursor)
	{
	}
}
