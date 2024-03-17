<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\ReleaseChannel;
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
		public Optional|Collection $previousUrlKeys,
		public Optional|string|null $logoUrl = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $deletionRequestedAt = null,
		public Optional|ReleaseChannel $releaseChannel,
		public Optional|bool $samlEnabled,
		public Optional|string|null $samlSettings = null,
		/** @var Collection<int, string> */
		public Optional|Collection $allowedAuthServices,
		public Optional|bool $scimEnabled,
		public Optional|string $serviceId,
		public Optional|float $userCount
	) {
	}
}
