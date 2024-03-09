<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\TimelessDate, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\JSON, Glhd\Linearavel\Data\IssueConnection, Glhd\Linearavel\Data\Contracts\Node;
class ProjectMilestone extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $name, public Optional|TimelessDate|null $targetDate, public Optional|Project $project, public Optional|float $sortOrder, public Optional|string|null $description, public Optional|JSON|null $descriptionData, public Optional|string|null $descriptionState, public Optional|IssueConnection $issues)
    {
    }
}
