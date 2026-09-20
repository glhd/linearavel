<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\IdentityProviderType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IdentityProvider */
class IdentityProvider extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|bool $defaultMigrated,
		public Optional|IdentityProviderType $type,
		public Optional|bool $samlEnabled,
		public Optional|bool $scimEnabled,
		public Optional|bool $allowNameChange,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $ssoEndpoint,
		public Optional|string|null $ssoBinding,
		public Optional|string|null $ssoSignAlgo,
		public Optional|string|null $ssoSigningCert,
		public Optional|string|null $issuerEntityId,
		public Optional|string|null $spEntityId,
		public Optional|float|null $priority,
		#[LinearDate]
		public Optional|CarbonImmutable|null $ssoVerifiedAt,
		public Optional|string|null $ownersGroupPush,
		public Optional|string|null $adminsGroupPush,
		public Optional|string|null $guestsGroupPush
	) {
	}
}
