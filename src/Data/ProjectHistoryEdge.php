<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectHistoryEdge */
class ProjectHistoryEdge extends Data
{
	public function __construct(public Optional|ProjectHistory $node, public Optional|string $cursor)
	{
	}
}
