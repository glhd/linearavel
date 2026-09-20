<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\ReleaseChannel;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AuthOrganization */
class AuthOrganization extends Data
{
	public function __construct(
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|string $id,
		public Optional|string $name,
		public Optional|bool $enabled,
		public Optional|string $urlKey,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $previousUrlKeys,
		public Optional|ReleaseChannel $releaseChannel,
		public Optional|bool $samlEnabled,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $allowedAuthServices,
		public Optional|string $authSettings,
		public Optional|bool $scimEnabled,
		public Optional|string $serviceId,
		public Optional|string $region,
		public Optional|string $cell,
		public Optional|float $approximateUserCount,
		public Optional|bool $hideNonPrimaryOrganizations,
		public Optional|string|null $logoUrl,
		#[LinearDate]
		public Optional|CarbonImmutable|null $deletionRequestedAt,
		public Optional|string|null $samlSettings,
		public Optional|float|null $userCount
	) {
	}
}
