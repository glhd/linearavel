<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\TimelessDate, Illuminate\Support\Collection, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\Cycle, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\ProjectMilestone, Glhd\Linearavel\Data\Template, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\ExternalUser, Glhd\Linearavel\Data\WorkflowState, Glhd\Linearavel\Data\Comment, Glhd\Linearavel\Data\IntegrationService, Glhd\Linearavel\Data\ActorBot, Glhd\Linearavel\Data\Favorite, Glhd\Linearavel\Data\UserConnection, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\IssueConnection, Glhd\Linearavel\Data\CommentConnection, Glhd\Linearavel\Data\IssueHistoryConnection, Glhd\Linearavel\Data\IssueLabelConnection, Glhd\Linearavel\Data\IssueRelationConnection, Glhd\Linearavel\Data\AttachmentConnection, Glhd\Linearavel\Data\JSON, Glhd\Linearavel\Data\Contracts\Node;
class Issue extends Data implements Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|float $number,
        public Optional|string $title,
        public Optional|float $priority,
        public Optional|float|null $estimate,
        public Optional|float $boardOrder,
        public Optional|float $sortOrder,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $startedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $completedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $startedTriageAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $triagedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $canceledAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoClosedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoArchivedAt,
        public Optional|TimelessDate|null $dueDate,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $slaStartedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $slaBreachesAt,
        public Optional|bool|null $trashed,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $snoozedUntilAt,
        /** @var Collection<int, string> */
        public Collection $labelIds,
        public Optional|Team $team,
        public Optional|Cycle|null $cycle,
        public Optional|Project|null $project,
        public Optional|ProjectMilestone|null $projectMilestone,
        public Optional|Template|null $lastAppliedTemplate,
        /** @var Collection<int, string> */
        public Collection $previousIdentifiers,
        public Optional|User|null $creator,
        public Optional|ExternalUser|null $externalUserCreator,
        public Optional|User|null $assignee,
        public Optional|User|null $snoozedBy,
        public Optional|WorkflowState $state,
        public Optional|float|null $subIssueSortOrder,
        public Optional|string $priorityLabel,
        public Optional|Comment|null $sourceComment,
        public Optional|IntegrationService|null $integrationSourceType,
        public Optional|ActorBot|null $botActor,
        public Optional|Favorite|null $favorite,
        public Optional|string $identifier,
        public Optional|string $url,
        public Optional|string $branchName,
        public Optional|int $customerTicketCount,
        public Optional|UserConnection $subscribers,
        public Optional|Issue|null $parent,
        public Optional|IssueConnection $children,
        public Optional|CommentConnection $comments,
        public Optional|IssueHistoryConnection $history,
        public Optional|IssueLabelConnection $labels,
        public Optional|IssueRelationConnection $relations,
        public Optional|IssueRelationConnection $inverseRelations,
        public Optional|AttachmentConnection $attachments,
        public Optional|string|null $description,
        public Optional|JSON|null $descriptionData,
        public Optional|string|null $descriptionState
    )
    {
    }
}
