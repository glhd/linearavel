<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OauthClient extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $clientId,
		public Optional|string $name,
		public Optional|string $developer,
		public Optional|string $developerUrl,
		public Optional|string $clientSecret,
		/** @var Collection<int, string> */
		public Optional|Collection $redirectUris,
		public Optional|bool $publicEnabled,
		public Optional|User $creator,
		public Optional|Organization $organization,
		/** @var Collection<int, string> */
		public Optional|Collection $webhookResourceTypes,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $imageUrl,
		public Optional|string|null $webhookUrl,
		public Optional|string|null $webhookSecret
	) {
	}
}
