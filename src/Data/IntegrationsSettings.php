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
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|bool|null $slackIssueCreated = null,
		public Optional|bool|null $slackIssueNewComment = null,
		public Optional|bool|null $slackIssueStatusChangedDone = null,
		public Optional|bool|null $slackIssueStatusChangedAll = null,
		public Optional|bool|null $slackProjectUpdateCreated = null,
		public Optional|bool|null $slackProjectUpdateCreatedToTeam = null,
		public Optional|bool|null $slackProjectUpdateCreatedToWorkspace = null,
		public Optional|bool|null $slackIssueAddedToTriage = null,
		public Optional|bool|null $slackIssueSlaHighRisk = null,
		public Optional|bool|null $slackIssueSlaBreached = null,
		public Optional|Team|null $team = null,
		public Optional|Project|null $project = null
	) {
	}
}
