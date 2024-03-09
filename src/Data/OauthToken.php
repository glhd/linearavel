<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\AuthOauthClient, Glhd\Linearavel\Data\AuthUser;
class OauthToken extends Data
{
    function __construct(public Optional|float $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $revokedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, public Optional|AuthOauthClient $client, public Optional|string $clientId, public Optional|AuthUser $user, public Optional|string $userId)
    {
    }
}
