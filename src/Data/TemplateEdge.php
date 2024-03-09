<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TemplateEdge extends Data
{
	function __construct(public Optional|Template $node, public Optional|string $cursor)
	{
	}
}
