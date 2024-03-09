<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\AuthenticationSessionType, Illuminate\Support\Collection, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface;
class AuthenticationSessionResponse extends Data
{
    function __construct(
        public Optional|string $id,
        public Optional|AuthenticationSessionType $type,
        public Optional|string|null $ip,
        public Optional|string|null $locationCountry,
        public Optional|string|null $locationCountryCode,
        /** @var Collection<int, string> */
        public Collection $countryCodes,
        public Optional|string|null $locationCity,
        public Optional|string|null $userAgent,
        public Optional|string|null $browserType,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $lastActiveAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        public Optional|string|null $location,
        public Optional|string|null $operatingSystem,
        public Optional|string|null $client,
        public Optional|string $name,
        public Optional|bool $isCurrentSession
    )
    {
    }
}
