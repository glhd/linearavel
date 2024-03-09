<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomViewEdge extends Data
{
	function __construct(public Optional|CustomView $node, public Optional|string $cursor)
	{
	}
}
