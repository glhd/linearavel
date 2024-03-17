<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOauthClient extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $clientId,
		public Optional|string $name,
		public Optional|string $developer,
		public Optional|string $developerUrl,
		public Optional|string $clientSecret,
		/** @var Collection<int, string> */
		public Optional|Collection $redirectUris,
		public Optional|bool $publicEnabled,
		public Optional|string $creatorId,
		public Optional|string $organizationId,
		public Optional|string|null $description,
		public Optional|string|null $imageUrl,
		public Optional|string|null $webhookUrl,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt
	) {
	}
}
