<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ProjectUpdateHealthType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectUpdate */
class ProjectUpdate extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $body,
		public Optional|string $reactionData,
		public Optional|string $bodyData,
		public Optional|string $slugId,
		public Optional|Project $project,
		public Optional|ProjectUpdateHealthType $health,
		public Optional|User $user,
		public Optional|bool $isDiffHidden,
		public Optional|string $url,
		public Optional|bool $isStale,
		/** @var Collection<int, Reaction> */
		public Optional|Collection $reactions,
		public Optional|CommentConnection $comments,
		public Optional|int $commentCount,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $editedAt,
		public Optional|string|null $shortSummary,
		public Optional|string|null $infoSnapshot,
		public Optional|string|null $diff,
		public Optional|string|null $diffMarkdown
	) {
	}
}
