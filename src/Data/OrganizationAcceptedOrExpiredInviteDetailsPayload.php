<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\OrganizationInviteStatus;
class OrganizationAcceptedOrExpiredInviteDetailsPayload extends Data
{
    function __construct(public Optional|OrganizationInviteStatus $status)
    {
    }
}
