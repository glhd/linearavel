<?php

namespace Glhd\Linearavel\Requests\Inputs;

class WorkflowStateUpdateInput
{
	function __construct(public ?string $name = null, public ?string $color = null, public ?string $description = null, public ?float $position = null)
	{
	}
}
