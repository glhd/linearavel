<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\AuthenticationSessionType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthenticationSessionResponse extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|AuthenticationSessionType $type,
		/** @var Collection<int, string> */
		public Optional|Collection $countryCodes,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|bool $isCurrentSession,
		public Optional|string|null $ip,
		public Optional|string|null $locationCountry,
		public Optional|string|null $locationCountryCode,
		public Optional|string|null $locationCity,
		public Optional|string|null $userAgent,
		public Optional|string|null $browserType,
		#[LinearDate]
		public Optional|CarbonImmutable|null $lastActiveAt,
		public Optional|string|null $location,
		public Optional|string|null $operatingSystem,
		public Optional|string|null $client
	) {
	}
}
