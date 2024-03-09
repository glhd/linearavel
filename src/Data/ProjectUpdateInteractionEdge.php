<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateInteractionEdge extends Data
{
	function __construct(public Optional|ProjectUpdateInteraction $node, public Optional|string $cursor)
	{
	}
}
