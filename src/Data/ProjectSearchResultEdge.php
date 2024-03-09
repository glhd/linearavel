<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectSearchResultEdge extends Data
{
	function __construct(public Optional|ProjectSearchResult $node, public Optional|string $cursor)
	{
	}
}
