<?php

namespace Glhd\Linearavel\Requests\Inputs;

class WorkflowStateUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $color = null, public ?string $description = null, public ?float $position = null)
	{
	}
}
