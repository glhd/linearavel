<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserAccount extends Data
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $email,
		public Optional|string $service,
		public Optional|bool $authTokenLinkDisabled,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $name
	) {
	}
}
