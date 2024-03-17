<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Organization|null $organization = null, public Optional|bool $success)
	{
	}
}
