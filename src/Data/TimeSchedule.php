<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\TimeScheduleEntry, Illuminate\Support\Collection, Glhd\Linearavel\Data\Organization, Glhd\Linearavel\Data\Integration, Glhd\Linearavel\Data\Contracts\Node;
class TimeSchedule extends Data implements Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|string $name,
        /** @var Collection<int, TimeScheduleEntry> */
        public Collection $entries,
        public Optional|string|null $externalId,
        public Optional|string|null $externalUrl,
        public Optional|Organization $organization,
        public Optional|Integration|null $integration
    )
    {
    }
}
