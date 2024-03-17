<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowCronJobDefinitionEdge extends Data
{
	public function __construct(public Optional|WorkflowCronJobDefinition $node, public Optional|string $cursor)
	{
	}
}
