<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\OrganizationDomain;
class OrganizationDomainPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|OrganizationDomain $organizationDomain, public Optional|bool $success)
    {
    }
}
