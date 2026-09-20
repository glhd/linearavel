<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\AgentActivityContent;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\AgentActivityExecutionSkippedReason;
use Glhd\Linearavel\Data\Enums\AgentActivitySignal;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentActivity */
class AgentActivity extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|AgentSession $agentSession,
		public Optional|AgentActivityContent $content,
		public Optional|User $user,
		public Optional|bool $ephemeral,
		public Optional|bool $queued,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Comment|null $sourceComment,
		public Optional|string|null $sourceMetadata,
		public Optional|AgentActivityExecutionSkippedReason|null $executionSkippedReason,
		public Optional|AgentActivitySignal|null $signal,
		public Optional|string|null $contextualMetadata,
		public Optional|AgentActivityPushSummary|null $pushSummary,
		#[LinearDate]
		public Optional|CarbonImmutable|null $sentAt,
		public Optional|string|null $signalMetadata
	) {
	}
}
