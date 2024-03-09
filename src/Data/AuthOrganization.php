<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Illuminate\Support\Collection, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\ReleaseChannel, Glhd\Linearavel\Data\JSONObject;
class AuthOrganization extends Data
{
    function __construct(
        public Optional|string $id,
        public Optional|string $name,
        public Optional|string $urlKey,
        /** @var Collection<int, string> */
        public Collection $previousUrlKeys,
        public Optional|string|null $logoUrl,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $deletionRequestedAt,
        public Optional|ReleaseChannel $releaseChannel,
        public Optional|bool $samlEnabled,
        public Optional|JSONObject|null $samlSettings,
        /** @var Collection<int, string> */
        public Collection $allowedAuthServices,
        public Optional|bool $scimEnabled,
        public Optional|string $serviceId,
        public Optional|float $userCount
    )
    {
    }
}
