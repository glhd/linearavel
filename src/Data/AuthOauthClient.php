<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Illuminate\Support\Collection, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface;
class AuthOauthClient extends Data
{
    function __construct(
        public Optional|string $id,
        public Optional|string $clientId,
        public Optional|string $name,
        public Optional|string|null $description,
        public Optional|string $developer,
        public Optional|string $developerUrl,
        public Optional|string|null $imageUrl,
        public Optional|string $clientSecret,
        /** @var Collection<int, string> */
        public Collection $redirectUris,
        public Optional|bool $publicEnabled,
        public Optional|string $creatorId,
        public Optional|string $organizationId,
        public Optional|string|null $webhookUrl,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt
    )
    {
    }
}
