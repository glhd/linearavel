<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationsSettings extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|bool|null $slackIssueCreated,
		public Optional|bool|null $slackIssueNewComment,
		public Optional|bool|null $slackIssueStatusChangedDone,
		public Optional|bool|null $slackIssueStatusChangedAll,
		public Optional|bool|null $slackProjectUpdateCreated,
		public Optional|bool|null $slackProjectUpdateCreatedToTeam,
		public Optional|bool|null $slackProjectUpdateCreatedToWorkspace,
		public Optional|bool|null $slackIssueAddedToTriage,
		public Optional|bool|null $slackIssueSlaHighRisk,
		public Optional|bool|null $slackIssueSlaBreached,
		public Optional|Team|null $team,
		public Optional|Project|null $project
	) {
	}
}
