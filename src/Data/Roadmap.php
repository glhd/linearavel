<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Organization, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\ProjectConnection, Glhd\Linearavel\Data\Contracts\Node;
class Roadmap extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $name, public Optional|string|null $description, public Optional|Organization $organization, public Optional|User $creator, public Optional|User $owner, public Optional|string $slugId, public Optional|float $sortOrder, public Optional|string|null $color, public Optional|ProjectConnection $projects)
    {
    }
}
