<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Release */
class Release extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|ReleasePipeline $pipeline,
		public Optional|ReleaseStage $stage,
		public Optional|string $slugId,
		public Optional|string $progressHistory,
		public Optional|string $currentProgress,
		public Optional|ReleaseHistoryConnection $history,
		public Optional|string $url,
		public Optional|DocumentConnection $documents,
		public Optional|IssueConnection $issues,
		public Optional|int $issueCount,
		public Optional|EntityExternalLinkConnection $links,
		/** @var Collection<int, ReleaseNote> */
		public Optional|Collection $releaseNotes,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $version,
		public Optional|string|null $commitSha,
		public Optional|ReleaseNote|null $releaseNote,
		public Optional|User|null $creator,
		public Optional|string|null $startDate,
		public Optional|string|null $targetDate,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $canceledAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $autoArchivedAt,
		public Optional|bool|null $trashed
	) {
	}
}
