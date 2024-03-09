<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\WorkflowType, Glhd\Linearavel\Data\WorkflowTrigger, Glhd\Linearavel\Data\WorkflowTriggerType, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\IssueLabel, Glhd\Linearavel\Data\Cycle, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\CustomView, Glhd\Linearavel\Data\ContextViewType, Glhd\Linearavel\Data\UserContextViewType, Glhd\Linearavel\Data\Contracts\Node;
class WorkflowDefinition extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|string $name, public Optional|string|null $groupName, public Optional|string|null $description, public Optional|WorkflowType $type, public Optional|WorkflowTrigger $trigger, public Optional|WorkflowTriggerType $triggerType, public Optional|JSONObject $conditions, public Optional|bool $enabled, public Optional|Team|null $team, public Optional|User $creator, public Optional|JSONObject $activities, public Optional|string $sortOrder, public Optional|IssueLabel|null $label, public Optional|Cycle|null $cycle, public Optional|User|null $user, public Optional|Project|null $project, public Optional|CustomView|null $customView, public Optional|ContextViewType|null $contextViewType, public Optional|UserContextViewType|null $userContextViewType)
    {
    }
}
