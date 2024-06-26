<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ContentComparatorInput
{
	public function __construct(public ?string $contains = null, public ?string $notContains = null)
	{
	}
}
