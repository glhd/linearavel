<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\Contracts\Node;
class IntegrationsSettings extends Data implements Node
{
    function __construct(public Optional|string $id, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt, #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt, public Optional|bool|null $slackIssueCreated, public Optional|bool|null $slackIssueNewComment, public Optional|bool|null $slackIssueStatusChangedDone, public Optional|bool|null $slackIssueStatusChangedAll, public Optional|bool|null $slackProjectUpdateCreated, public Optional|bool|null $slackProjectUpdateCreatedToTeam, public Optional|bool|null $slackProjectUpdateCreatedToWorkspace, public Optional|bool|null $slackIssueAddedToTriage, public Optional|bool|null $slackIssueSlaHighRisk, public Optional|bool|null $slackIssueSlaBreached, public Optional|Team|null $team, public Optional|Project|null $project)
    {
    }
}
