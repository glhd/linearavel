<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\OrganizationInvite;
class OrganizationInviteEdge extends Data
{
    function __construct(public Optional|OrganizationInvite $node, public Optional|string $cursor)
    {
    }
}
