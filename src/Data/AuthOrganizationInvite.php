<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOrganizationInvite extends Data
{
	public function __construct(public Optional|string $id, #[LinearDate] public Optional|CarbonImmutable|null $expiresAt)
	{
	}
}
