<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ContentComparator
{
	public function __construct(public ?string $contains = null, public ?string $notContains = null)
	{
	}
}
