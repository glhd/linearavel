<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectUpdateEdge */
class ProjectUpdateEdge extends Data
{
	public function __construct(public Optional|ProjectUpdate $node, public Optional|string $cursor)
	{
	}
}
