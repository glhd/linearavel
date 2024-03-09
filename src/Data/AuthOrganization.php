<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOrganization extends Data
{
	function __construct(
		public Optional|string $id,
		public Optional|string $name,
		public Optional|string $urlKey,
		/** @var Collection<int, string> */
		public Collection $previousUrlKeys,
		public Optional|string|null $logoUrl,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $deletionRequestedAt,
		public Optional|ReleaseChannel $releaseChannel,
		public Optional|bool $samlEnabled,
		public Optional|JSONObject|null $samlSettings,
		/** @var Collection<int, string> */
		public Collection $allowedAuthServices,
		public Optional|bool $scimEnabled,
		public Optional|string $serviceId,
		public Optional|float $userCount
	) {
	}
}
