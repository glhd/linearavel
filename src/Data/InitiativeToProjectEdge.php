<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InitiativeToProjectEdge extends Data
{
	public function __construct(public Optional|InitiativeToProject $node, public Optional|string $cursor)
	{
	}
}
