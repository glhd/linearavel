<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\IdentityProviderType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AuthIdentityProvider */
class AuthIdentityProvider extends Data
{
	public function __construct(
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|string $id,
		public Optional|bool $defaultMigrated,
		public Optional|IdentityProviderType $type,
		public Optional|bool $samlEnabled,
		public Optional|bool $scimEnabled,
		public Optional|string|null $ssoEndpoint,
		public Optional|string|null $ssoBinding,
		public Optional|string|null $ssoSignAlgo,
		public Optional|string|null $issuerEntityId,
		public Optional|string|null $spEntityId,
		public Optional|string|null $ssoSigningCert,
		public Optional|float|null $priority
	) {
	}
}
