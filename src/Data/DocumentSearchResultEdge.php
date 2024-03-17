<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentSearchResultEdge extends Data
{
	public function __construct(public Optional|DocumentSearchResult $node, public Optional|string $cursor)
	{
	}
}
