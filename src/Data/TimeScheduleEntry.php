<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TimeScheduleEntry extends Data
{
	public function __construct(
		#[LinearDate]
		public Optional|CarbonImmutable $startsAt,
		#[LinearDate]
		public Optional|CarbonImmutable $endsAt,
		public Optional|string|null $userId,
		public Optional|string|null $userEmail
	) {
	}
}
