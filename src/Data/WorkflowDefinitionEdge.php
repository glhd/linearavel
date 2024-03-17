<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowDefinitionEdge extends Data
{
	public function __construct(public Optional|WorkflowDefinition $node, public Optional|string $cursor)
	{
	}
}
