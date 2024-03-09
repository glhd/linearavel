<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\OrganizationInvite;
class OrganizationInvitePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|OrganizationInvite $organizationInvite, public Optional|bool $success)
    {
    }
}
