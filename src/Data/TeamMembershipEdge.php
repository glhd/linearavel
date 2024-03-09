<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\TeamMembership;
class TeamMembershipEdge extends Data
{
    function __construct(public Optional|TeamMembership $node, public Optional|string $cursor)
    {
    }
}
