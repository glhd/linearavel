<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Customer */
class Customer extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $domains,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $externalIds,
		public Optional|CustomerStatus $status,
		public Optional|float $approximateNeedCount,
		public Optional|string $slugId,
		/** @var Collection<int, CustomerNeed> */
		public Optional|Collection $needs,
		public Optional|string $url,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $logoUrl,
		public Optional|string|null $slackChannelId,
		public Optional|User|null $owner,
		public Optional|int|null $revenue,
		public Optional|float|null $size,
		public Optional|CustomerTier|null $tier,
		public Optional|string|null $mainSourceId,
		public Optional|Integration|null $integration
	) {
	}
}
