<?php

namespace Glhd\Linearavel\Data\Enums;

enum OrganizationInviteStatus : string
{
    case pending = 'pending';
    case accepted = 'accepted';
    case expired = 'expired';
}
