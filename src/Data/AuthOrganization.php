<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\ReleaseChannel;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOrganization extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $name,
		public Optional|string $urlKey,
		/** @var Collection<int, string> */
		public Optional|Collection $previousUrlKeys,
		public Optional|ReleaseChannel $releaseChannel,
		public Optional|bool $samlEnabled,
		/** @var Collection<int, string> */
		public Optional|Collection $allowedAuthServices,
		public Optional|bool $scimEnabled,
		public Optional|string $serviceId,
		public Optional|float $userCount,
		public Optional|string|null $logoUrl,
		#[LinearDate]
		public Optional|CarbonImmutable|null $deletionRequestedAt,
		public Optional|string|null $samlSettings
	) {
	}
}
