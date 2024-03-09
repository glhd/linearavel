<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\WorkflowState, Glhd\Linearavel\Data\Cycle, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\IssueImport, Glhd\Linearavel\Data\Attachment, Illuminate\Support\Collection, Glhd\Linearavel\Data\IssueRelationHistoryPayload, Glhd\Linearavel\Data\TimelessDate, Glhd\Linearavel\Data\JSONObject, Glhd\Linearavel\Data\ActorBot, Glhd\Linearavel\Data\IssueLabel, Glhd\Linearavel\Data\Contracts\Node;
class IssueHistory extends Data implements Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|Issue $issue,
        public Optional|User|null $actor,
        public Optional|string|null $actorId,
        public Optional|bool|null $updatedDescription,
        public Optional|string|null $fromTitle,
        public Optional|string|null $toTitle,
        public Optional|User|null $fromAssignee,
        public Optional|string|null $fromAssigneeId,
        public Optional|User|null $toAssignee,
        public Optional|string|null $toAssigneeId,
        public Optional|float|null $fromPriority,
        public Optional|float|null $toPriority,
        public Optional|Team|null $fromTeam,
        public Optional|string|null $fromTeamId,
        public Optional|Team|null $toTeam,
        public Optional|string|null $toTeamId,
        public Optional|Issue|null $fromParent,
        public Optional|string|null $fromParentId,
        public Optional|Issue|null $toParent,
        public Optional|string|null $toParentId,
        public Optional|WorkflowState|null $fromState,
        public Optional|string|null $fromStateId,
        public Optional|WorkflowState|null $toState,
        public Optional|string|null $toStateId,
        public Optional|Cycle|null $fromCycle,
        public Optional|string|null $fromCycleId,
        public Optional|Cycle|null $toCycle,
        public Optional|string|null $toCycleId,
        public Optional|Project|null $toConvertedProject,
        public Optional|string|null $toConvertedProjectId,
        public Optional|Project|null $fromProject,
        public Optional|string|null $fromProjectId,
        public Optional|Project|null $toProject,
        public Optional|string|null $toProjectId,
        public Optional|float|null $fromEstimate,
        public Optional|float|null $toEstimate,
        public Optional|bool|null $archived,
        public Optional|bool|null $trashed,
        public Optional|IssueImport|null $issueImport,
        public Optional|Attachment|null $attachment,
        public Optional|string|null $attachmentId,
        /** @var Collection<int, string> */
        public Collection $addedLabelIds,
        /** @var Collection<int, string> */
        public Collection $removedLabelIds,
        /** @var Collection<int, IssueRelationHistoryPayload> */
        public Collection $relationChanges,
        public Optional|bool|null $autoClosed,
        public Optional|bool|null $autoArchived,
        public Optional|TimelessDate|null $fromDueDate,
        public Optional|TimelessDate|null $toDueDate,
        public Optional|JSONObject|null $changes,
        public Optional|ActorBot|null $botActor,
        /** @var Collection<int, IssueLabel> */
        public Collection $addedLabels,
        /** @var Collection<int, IssueLabel> */
        public Collection $removedLabels
    )
    {
    }
}
