<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IntegrationsSettings */
class IntegrationsSettings extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		#[LinearDate]
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
