<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSessionEdge */
class AgentSessionEdge extends Data
{
	public function __construct(public Optional|AgentSession $node, public Optional|string $cursor)
	{
	}
}
