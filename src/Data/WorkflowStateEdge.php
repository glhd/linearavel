<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowStateEdge extends Data
{
	function __construct(public Optional|WorkflowState $node, public Optional|string $cursor)
	{
	}
}
