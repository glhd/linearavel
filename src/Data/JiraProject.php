<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\JiraProjectImportStatus;
use Glhd\Linearavel\Data\Enums\JiraProjectSyncStatus;
use Glhd\Linearavel\Data\Enums\JiraSyncDirection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/JiraProject */
class JiraProject extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|Integration $integration,
		public Optional|string $externalId,
		public Optional|string $key,
		public Optional|string $name,
		public Optional|bool $isDefault,
		public Optional|JiraProjectSyncStatus $syncStatus,
		public Optional|JiraProjectImportStatus $importStatus,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Team|null $team,
		public Optional|JiraSyncDirection|null $syncDirection,
		#[LinearDate]
		public Optional|CarbonImmutable|null $syncEnabledAt,
		public Optional|User|null $creator,
		public Optional|Team|null $linearTeam,
		public Optional|IssueImport|null $latestImport,
		public Optional|int|null $importedIssueCount,
		public Optional|string|null $configurationError
	) {
	}
}
