<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\UserRoleType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OrganizationInvite */
class OrganizationInvite extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $email,
		public Optional|UserRoleType $role,
		public Optional|bool $external,
		public Optional|string $metadata,
		public Optional|User $inviter,
		public Optional|Organization $organization,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $acceptedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $expiresAt,
		public Optional|User|null $invitee
	) {
	}
}
