<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueHistoryEdge extends Data
{
	function __construct(public Optional|IssueHistory $node, public Optional|string $cursor)
	{
	}
}
