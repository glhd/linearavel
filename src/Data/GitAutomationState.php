<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\WorkflowState, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\GitAutomationTargetBranch, Glhd\Linearavel\Data\GitAutomationStates, Glhd\Linearavel\Data\Contracts\Node;
class GitAutomationState extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|WorkflowState|null $state, public Optional|Team $team, public Optional|GitAutomationTargetBranch|null $targetBranch, public Optional|GitAutomationStates $event, public Optional|string|null $branchPattern)
    {
    }
}
