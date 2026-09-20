<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\PullRequestStatus;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequest */
class PullRequest extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $slugId,
		public Optional|string $title,
		public Optional|float $number,
		public Optional|string $sourceBranch,
		public Optional|string $targetBranch,
		public Optional|string $url,
		public Optional|PullRequestStatus $status,
		public Optional|string $mergeStatus,
		public Optional|bool $autoMergeEnabled,
		public Optional|bool $hasConflicts,
		public Optional|bool $isBehind,
		#[LinearDate]
		public Optional|CarbonImmutable $openedAt,
		/** @var Collection<int, PullRequestPreviewLink> */
		public Optional|Collection $previewLinks,
		/** @var Collection<int, PullRequestCheck> */
		public Optional|Collection $checks,
		/** @var Collection<int, PullRequestCommit> */
		public Optional|Collection $commits,
		public Optional|string $reactionData,
		/** @var Collection<int, Reaction> */
		public Optional|Collection $reactions,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $nativeStackId,
		public Optional|float|null $nativeStackNumber,
		public Optional|float|null $nativeStackPosition,
		public Optional|float|null $nativeStackSize,
		public Optional|string|null $nativeStackTargetBranch,
		public Optional|string|null $headSha,
		public Optional|string|null $baseSha,
		public Optional|PullRequestMergeSettings|null $mergeSettings,
		#[LinearDate]
		public Optional|CarbonImmutable|null $closedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $mergedAt,
		public Optional|PullRequestCommit|null $mergeCommit,
		public Optional|User|null $creator,
		public Optional|User|null $mergedByUser,
		public Optional|ExternalUser|null $mergedByExternalUser
	) {
	}
}
