<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueEdge extends Data
{
	function __construct(public Optional|Issue $node, public Optional|string $cursor)
	{
	}
}
