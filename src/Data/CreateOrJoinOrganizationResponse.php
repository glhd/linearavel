<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\AuthOrganization, Glhd\Linearavel\Data\AuthUser;
class CreateOrJoinOrganizationResponse extends Data
{
    function __construct(public Optional|AuthOrganization $organization, public Optional|AuthUser $user)
    {
    }
}
