<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ExternalUserEdge extends Data
{
	function __construct(public Optional|ExternalUser $node, public Optional|string $cursor)
	{
	}
}
