<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectLinkEdge extends Data
{
	function __construct(public Optional|ProjectLink $node, public Optional|string $cursor)
	{
	}
}
