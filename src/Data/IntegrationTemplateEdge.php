<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationTemplateEdge extends Data
{
	function __construct(public Optional|IntegrationTemplate $node, public Optional|string $cursor)
	{
	}
}
