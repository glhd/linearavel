<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationInvitePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|OrganizationInvite $organizationInvite, public Optional|bool $success)
	{
	}
}
