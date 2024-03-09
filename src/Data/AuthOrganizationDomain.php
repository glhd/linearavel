<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\OrganizationDomainAuthType;
class AuthOrganizationDomain extends Data
{
    function __construct(public Optional|string $id, public Optional|string $organizationId, public Optional|string $name, public Optional|bool $verified, public Optional|bool|null $claimed, public Optional|OrganizationDomainAuthType $authType)
    {
    }
}
