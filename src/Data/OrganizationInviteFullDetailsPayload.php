<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\OrganizationInviteStatus, Glhd\Linearavel\Data\UserRoleType, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface;
class OrganizationInviteFullDetailsPayload extends Data
{
    function __construct(public Optional|OrganizationInviteStatus $status, public Optional|string $inviter, public Optional|string $email, public Optional|UserRoleType $role, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, public Optional|string $organizationName, public Optional|string $organizationId, public Optional|string|null $organizationLogoUrl, public Optional|bool $accepted, public Optional|bool $expired)
    {
    }
}
