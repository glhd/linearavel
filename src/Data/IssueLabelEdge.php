<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueLabelEdge extends Data
{
	public function __construct(public Optional|IssueLabel $node, public Optional|string $cursor)
	{
	}
}
