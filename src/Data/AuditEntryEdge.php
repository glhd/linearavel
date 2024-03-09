<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuditEntryEdge extends Data
{
	function __construct(public Optional|AuditEntry $node, public Optional|string $cursor)
	{
	}
}
