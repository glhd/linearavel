<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ContentComparator
{
	function __construct(public ?string $contains = null, public ?string $notContains = null)
	{
	}
}
