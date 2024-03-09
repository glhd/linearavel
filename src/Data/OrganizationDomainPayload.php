<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationDomainPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|OrganizationDomain $organizationDomain, public Optional|bool $success)
	{
	}
}
