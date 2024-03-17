<?php

namespace Glhd\Linearavel\Requests\Inputs;

class RoadmapUpdateInput
{
	function __construct(public ?string $name = null, public ?string $description = null, public ?string $ownerId = null, public ?float $sortOrder = null, public ?string $color = null)
	{
	}
}
