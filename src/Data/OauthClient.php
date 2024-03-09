<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OauthClient extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string $clientId,
		public Optional|string $name,
		public Optional|string|null $description,
		public Optional|string $developer,
		public Optional|string $developerUrl,
		public Optional|string|null $imageUrl,
		public Optional|string $clientSecret,
		/** @var Collection<int, string> */
		public Collection $redirectUris,
		public Optional|bool $publicEnabled,
		public Optional|User $creator,
		public Optional|Organization $organization,
		/** @var Collection<int, string> */
		public Collection $webhookResourceTypes,
		public Optional|string|null $webhookUrl,
		public Optional|string|null $webhookSecret
	) {
	}
}
