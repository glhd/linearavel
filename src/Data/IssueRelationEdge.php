<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueRelationEdge extends Data
{
	function __construct(public Optional|IssueRelation $node, public Optional|string $cursor)
	{
	}
}
