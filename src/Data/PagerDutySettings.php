<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PagerDutySettings */
class PagerDutySettings extends Data
{
	public function __construct(#[LinearDate] public Optional|CarbonImmutable $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
