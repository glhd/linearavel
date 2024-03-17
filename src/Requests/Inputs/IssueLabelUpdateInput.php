<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IssueLabelUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $parentId = null, public ?string $color = null)
	{
	}
}
