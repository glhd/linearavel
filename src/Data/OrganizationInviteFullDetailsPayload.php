<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\OrganizationInviteStatus;
use Glhd\Linearavel\Data\Enums\UserRoleType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OrganizationInviteFullDetailsPayload */
class OrganizationInviteFullDetailsPayload extends Data
{
	public function __construct(
		public Optional|OrganizationInviteStatus $status,
		public Optional|string $inviter,
		public Optional|string $email,
		public Optional|UserRoleType $role,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|string $organizationName,
		public Optional|string $organizationId,
		public Optional|bool $accepted,
		public Optional|bool $expired,
		public Optional|string|null $organizationLogoUrl
	) {
	}
}
