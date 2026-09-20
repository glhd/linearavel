<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Data\Enums\OrganizationInviteStatus;
use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OrganizationInviteFullDetailsPayload */
class OrganizationInviteFullDetailsPayload extends Data implements OrganizationInviteDetailsPayload
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
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $allowedAuthServices,
		public Optional|string|null $organizationLogoUrl
	) {
	}
}
