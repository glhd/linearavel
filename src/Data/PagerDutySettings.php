<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PagerDutySettings extends Data
{
	public function __construct(#[LinearDate] public Optional|CarbonImmutable $apiFailedWithUnauthorizedErrorAt)
	{
	}
}
