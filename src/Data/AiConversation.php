<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\AiConversationPart;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\AiConversationClientPlatform;
use Glhd\Linearavel\Data\Enums\AiConversationInitialSource;
use Glhd\Linearavel\Data\Enums\AiConversationStatus;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversation */
class AiConversation extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $context,
		public Optional|string $slugId,
		public Optional|AiConversationInitialSource $initialSource,
		public Optional|AiConversationStatus $status,
		/** @var Collection<int, AiConversationUserState> */
		public Optional|Collection $userState,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|User|null $user,
		public Optional|LoopExecution|null $loopExecution,
		public Optional|Issue|null $issue,
		public Optional|Document|null $document,
		public Optional|Project|null $project,
		public Optional|Initiative|null $initiative,
		public Optional|PullRequest|null $pullRequest,
		public Optional|Diff|null $diff,
		public Optional|string|null $summary,
		public Optional|WorkflowDefinition|null $workflowDefinition,
		public Optional|WorkflowCronJobDefinition|null $workflowCronJobDefinition,
		public Optional|AiConversationClientPlatform|null $clientPlatform,
		public Optional|string|null $iterationId,
		public Optional|string|null $evalLogId,
		/** @var Collection<int, AiConversationPart> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $parts,
		#[LinearDate]
		public Optional|CarbonImmutable|null $readAt
	) {
	}
}
