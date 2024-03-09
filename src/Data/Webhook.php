<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\User, Illuminate\Support\Collection, Glhd\Linearavel\Data\Contracts\Node;
class Webhook extends Data implements Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|string|null $label,
        public Optional|string|null $url,
        public Optional|bool $enabled,
        public Optional|Team|null $team,
        public Optional|bool $allPublicTeams,
        public Optional|User|null $creator,
        public Optional|string|null $secret,
        /** @var Collection<int, string> */
        public Collection $resourceTypes
    )
    {
    }
}
