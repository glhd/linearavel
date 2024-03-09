<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\TimelessDate, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\IssueDraft, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\JSON, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\Contracts\Node;
class IssueDraft extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $title, public Optional|string|null $description, public Optional|float $priority, public Optional|float|null $estimate, public Optional|TimelessDate|null $dueDate, public Optional|string $teamId, public Optional|string|null $cycleId, public Optional|string|null $projectId, public Optional|string|null $projectMilestoneId, public Optional|User $creator, public Optional|string|null $assigneeId, public Optional|string $stateId, public Optional|IssueDraft|null $parent, public Optional|Issue|null $parentIssue, public Optional|float|null $subIssueSortOrder, public Optional|string $priorityLabel, public Optional|JSON|null $descriptionData, public Optional|JSONObject $attachments)
    {
    }
}
