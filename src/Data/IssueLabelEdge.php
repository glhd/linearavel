<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueLabelEdge */
class IssueLabelEdge extends Data
{
	public function __construct(public Optional|IssueLabel $node, public Optional|string $cursor)
	{
	}
}
