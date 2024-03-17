<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueSearchResultEdge extends Data
{
	public function __construct(public Optional|IssueSearchResult $node, public Optional|string $cursor)
	{
	}
}
