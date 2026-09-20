<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CodingAgentSandboxEntry */
class CodingAgentSandboxEntry extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $repository,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|string|null $creatorId,
		public Optional|string|null $sandboxUrl,
		public Optional|string|null $sandboxLogsUrl,
		public Optional|string|null $workerConversationId,
		public Optional|string|null $branchName,
		public Optional|string|null $baseRef,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $endedAt
	) {
	}
}
