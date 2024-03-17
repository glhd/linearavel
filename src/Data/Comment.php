<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Comment extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $body,
		public Optional|string $bodyData,
		public Optional|string $reactionData,
		public Optional|string $url,
		public Optional|CommentConnection $children,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Issue|null $issue,
		public Optional|DocumentContent|null $documentContent,
		public Optional|ProjectUpdate|null $projectUpdate,
		public Optional|Comment|null $parent,
		public Optional|User|null $resolvingUser,
		#[LinearDate] public Optional|CarbonImmutable|null $resolvedAt,
		public Optional|Comment|null $resolvingComment,
		public Optional|User|null $user,
		public Optional|ExternalUser|null $externalUser,
		#[LinearDate] public Optional|CarbonImmutable|null $editedAt,
		public Optional|string|null $quotedText,
		public Optional|string|null $summaryText,
		public Optional|ActorBot|null $botActor
	) {
	}
}
