<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSessionToPullRequestEdge */
class AgentSessionToPullRequestEdge extends Data
{
	public function __construct(public Optional|AgentSessionToPullRequest $node, public Optional|string $cursor)
	{
	}
}
