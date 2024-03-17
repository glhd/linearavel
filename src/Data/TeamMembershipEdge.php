<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamMembershipEdge extends Data
{
	public function __construct(public Optional|TeamMembership $node, public Optional|string $cursor)
	{
	}
}
