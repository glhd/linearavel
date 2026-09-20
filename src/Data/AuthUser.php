<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\UserRoleType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AuthUser */
class AuthUser extends Data
{
	public function __construct(
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|string $id,
		public Optional|string $name,
		public Optional|string $displayName,
		public Optional|string $email,
		public Optional|UserRoleType $role,
		public Optional|bool $active,
		public Optional|string $userAccountId,
		public Optional|AuthOrganization $organization,
		public Optional|string|null $avatarUrl,
		public Optional|string|null $oauthClientId,
		public Optional|AuthIdentityProvider|null $identityProvider
	) {
	}
}
