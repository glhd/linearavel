<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GitAutomationStateEdge extends Data
{
	public function __construct(public Optional|GitAutomationState $node, public Optional|string $cursor)
	{
	}
}
