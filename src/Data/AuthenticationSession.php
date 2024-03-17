<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\AuthenticationSessionType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthenticationSession extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|AuthenticationSessionType $type,
		/** @var Collection<int, string> */
		public Optional|Collection $countryCodes,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string|null $ip,
		public Optional|string|null $locationCountry,
		public Optional|string|null $locationCountryCode,
		public Optional|string|null $locationCity,
		public Optional|string|null $userAgent,
		public Optional|string|null $browserType,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $lastActiveAt,
		public Optional|string|null $location,
		public Optional|string|null $operatingSystem,
		public Optional|string|null $client
	) {
	}
}
