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

class AuthenticationSessionResponse extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|AuthenticationSessionType $type,
		public Optional|string|null $ip = null,
		public Optional|string|null $locationCountry = null,
		public Optional|string|null $locationCountryCode = null,
		/** @var Collection<int, string> */
		public Optional|Collection $countryCodes,
		public Optional|string|null $locationCity = null,
		public Optional|string|null $userAgent = null,
		public Optional|string|null $browserType = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $lastActiveAt = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string|null $location = null,
		public Optional|string|null $operatingSystem = null,
		public Optional|string|null $client = null,
		public Optional|string $name,
		public Optional|bool $isCurrentSession
	) {
	}
}
