<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\OAuthApplicationDistribution;
use Glhd\Linearavel\Data\Enums\OAuthApplicationGrantType;
use Glhd\Linearavel\Data\Enums\WebhookResourceType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OAuthApplication */
class OAuthApplication extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $clientId,
		public Optional|string $name,
		public Optional|string $developer,
		public Optional|string $developerUrl,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $redirectUris,
		public Optional|OAuthApplicationDistribution $distribution,
		/** @var Collection<int, WebhookResourceType> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $webhookResourceTypes,
		public Optional|bool $webhookEnabled,
		/** @var Collection<int, OAuthApplicationGrantType> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $grantTypes,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string|null $description,
		public Optional|string|null $imageUrl,
		public Optional|string|null $webhookUrl
	) {
	}
}
