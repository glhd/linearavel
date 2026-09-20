<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\DocumentContentAgentCheckpointMode;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DocumentContentHistoryCheckpointType */
class DocumentContentHistoryCheckpointType extends Data
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|DocumentContentAgentCheckpointMode $mode,
		public Optional|string $aiConversationId,
		public Optional|string $aiConversationTurnId,
		public Optional|bool $isActive,
		#[LinearDate]
		public Optional|CarbonImmutable $contentDataSnapshotAt,
		public Optional|string|null $invokedByUserId,
		public Optional|string|null $sourceMetadata
	) {
	}
}
