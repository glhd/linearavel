<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Organization, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\IssueConnection, Glhd\Linearavel\Data\Contracts\Node;
class CustomView extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $name, public Optional|string|null $description, public Optional|string|null $icon, public Optional|string|null $color, public Optional|Organization $organization, public Optional|Team|null $team, public Optional|User $creator, public Optional|User $owner, public Optional|User $updatedBy, public Optional|JSONObject $filters, public Optional|JSONObject $filterData, public Optional|JSONObject|null $projectFilterData, public Optional|bool $shared, public Optional|string $modelName, public Optional|IssueConnection $issues)
    {
    }
}
