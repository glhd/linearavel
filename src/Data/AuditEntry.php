<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Organization, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\Contracts\Node;
class AuditEntry extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $type, public Optional|Organization|null $organization, public Optional|User|null $actor, public Optional|string|null $actorId, public Optional|string|null $ip, public Optional|string|null $countryCode, public Optional|JSONObject|null $metadata, public Optional|JSONObject|null $requestInformation)
    {
    }
}
