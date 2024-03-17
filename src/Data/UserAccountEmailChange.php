<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserAccountEmailChange extends Data
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $oldEmail,
		public Optional|string $newEmail,
		#[LinearDate]
		public Optional|CarbonImmutable $expiresAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $oldEmailVerifiedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $newEmailVerifiedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $canceledAt
	) {
	}
}
