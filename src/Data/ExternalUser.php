<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ExternalUser extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $displayName,
		public Optional|Organization $organization,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $email,
		public Optional|string|null $avatarUrl,
		#[LinearDate] public Optional|CarbonImmutable|null $lastSeen
	) {
	}
}
