<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Comment */
class Comment extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $body,
		public Optional|string $reactionData,
		public Optional|string $url,
		public Optional|CommentConnection $children,
		public Optional|IssueConnection $createdIssues,
		/** @var Collection<int, Reaction> */
		public Optional|Collection $reactions,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Issue|null $issue,
		public Optional|string|null $issueId,
		public Optional|DocumentContent|null $documentContent,
		public Optional|string|null $documentContentId,
		public Optional|ProjectUpdate|null $projectUpdate,
		public Optional|string|null $projectUpdateId,
		public Optional|InitiativeUpdate|null $initiativeUpdate,
		public Optional|string|null $initiativeUpdateId,
		public Optional|Project|null $project,
		public Optional|string|null $projectId,
		public Optional|Initiative|null $initiative,
		public Optional|string|null $initiativeId,
		public Optional|Comment|null $parent,
		public Optional|string|null $parentId,
		public Optional|User|null $resolvingUser,
		#[LinearDate]
		public Optional|CarbonImmutable|null $resolvedAt,
		public Optional|Comment|null $resolvingComment,
		public Optional|string|null $resolvingCommentId,
		public Optional|User|null $user,
		public Optional|ExternalUser|null $externalUser,
		#[LinearDate]
		public Optional|CarbonImmutable|null $editedAt,
		public Optional|string|null $quotedText,
		public Optional|AgentSession|null $agentSession,
		public Optional|ActorBot|null $botActor,
		public Optional|User|null $onBehalfOf,
		public Optional|SyncedExternalThread|null $externalThread,
		/** @var Collection<int, ExternalEntityInfo> */
		public Optional|Collection|null $syncedWith
	) {
	}
}
