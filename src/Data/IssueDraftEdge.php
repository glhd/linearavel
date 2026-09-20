<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueDraftEdge */
class IssueDraftEdge extends Data
{
	public function __construct(public Optional|IssueDraft $node, public Optional|string $cursor)
	{
	}
}
