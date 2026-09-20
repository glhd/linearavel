<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\AgentSessionStatus;
use Glhd\Linearavel\Data\Enums\AgentSessionType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSession */
class AgentSession extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|User $appUser,
		public Optional|string $slugId,
		public Optional|AgentSessionStatus $status,
		public Optional|AgentActivityConnection $activities,
		public Optional|string $context,
		public Optional|AgentSessionToPullRequestConnection $pullRequests,
		/** @var Collection<int, AgentSessionExternalLink> */
		public Optional|Collection $externalLinks,
		public Optional|string $externalUrls,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|User|null $creator,
		public Optional|Comment|null $comment,
		public Optional|Comment|null $sourceComment,
		public Optional|Issue|null $issue,
		public Optional|PullRequest|null $pullRequest,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $endedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $dismissedAt,
		public Optional|User|null $dismissedBy,
		public Optional|string|null $externalLink,
		public Optional|string|null $summary,
		public Optional|string|null $sourceMetadata,
		public Optional|string|null $modelSelection,
		public Optional|string|null $plan,
		public Optional|string|null $workspaceDiff,
		public Optional|AgentSessionType|null $type,
		public Optional|string|null $url,
		public Optional|string|null $codingHarnessModelLabel,
		/** @var Collection<int, AgentSessionWorkspaceDiffFile> */
		public Optional|Collection|null $workspaceDiffFiles
	) {
	}
}
