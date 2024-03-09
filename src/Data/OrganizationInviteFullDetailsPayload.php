<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationInviteFullDetailsPayload extends Data
{
	function __construct(
		public Optional|OrganizationInviteStatus $status,
		public Optional|string $inviter,
		public Optional|string $email,
		public Optional|UserRoleType $role,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		public Optional|string $organizationName,
		public Optional|string $organizationId,
		public Optional|string|null $organizationLogoUrl,
		public Optional|bool $accepted,
		public Optional|bool $expired
	) {
	}
}