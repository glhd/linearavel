<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AuthMembership */
class AuthMembership extends Data
{
	public function __construct(public Optional|string $userId, #[LinearDate] public Optional|CarbonImmutable $createdAt)
	{
	}
}
