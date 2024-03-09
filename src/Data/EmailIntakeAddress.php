<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Template, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\Organization, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\Contracts\Node;
class EmailIntakeAddress extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $address, public Optional|bool $enabled, public Optional|Template|null $template, public Optional|Team $team, public Optional|Organization $organization, public Optional|User|null $creator)
    {
    }
}
