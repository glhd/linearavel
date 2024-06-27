<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/WorkflowStateUpdateInput */
class WorkflowStateUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $color = null, public ?string $description = null, public ?float $position = null)
	{
	}
}
