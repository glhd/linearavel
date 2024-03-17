<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TriageResponsibilityEdge extends Data
{
	public function __construct(public Optional|TriageResponsibility $node, public Optional|string $cursor)
	{
	}
}
