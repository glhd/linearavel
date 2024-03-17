<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PaidSubscription extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|float $seats,
		public Optional|Organization $organization,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|float|null $seatsMinimum,
		public Optional|float|null $seatsMaximum,
		public Optional|User|null $creator,
		public Optional|string|null $collectionMethod,
		#[LinearDate]
		public Optional|CarbonImmutable|null $canceledAt,
		public Optional|string|null $pendingChangeType,
		#[LinearDate]
		public Optional|CarbonImmutable|null $nextBillingAt
	) {
	}
}
