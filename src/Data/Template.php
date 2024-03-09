<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\JSON, Glhd\Linearavel\Data\Organization, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\Contracts\Node;
class Template extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $type, public Optional|string $name, public Optional|string|null $description, public Optional|JSON $templateData, public Optional|Organization|null $organization, public Optional|Team|null $team, public Optional|User|null $creator, public Optional|User|null $lastUpdatedBy)
    {
    }
}
