<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuditEntry extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Organization|null $organization,
		public Optional|User|null $actor,
		public Optional|string|null $actorId,
		public Optional|string|null $ip,
		public Optional|string|null $countryCode,
		public Optional|string|null $metadata,
		public Optional|string|null $requestInformation
	) {
	}
}
