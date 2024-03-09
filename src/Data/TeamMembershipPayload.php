<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\TeamMembership;
class TeamMembershipPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|TeamMembership|null $teamMembership, public Optional|bool $success)
    {
    }
}
