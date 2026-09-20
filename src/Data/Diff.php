<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Diff */
class Diff extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $contentHash,
		public Optional|float $fileCount,
		public Optional|float $additions,
		public Optional|float $deletions,
		public Optional|bool $truncated,
		public Optional|string $slugId,
		public Optional|Organization $organization,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|AgentSession|null $agentSession,
		public Optional|PullRequest|null $pullRequest,
		public Optional|User|null $creator,
		/** @var Collection<int, DiffFile> */
		public Optional|Collection|null $files
	) {
	}
}
