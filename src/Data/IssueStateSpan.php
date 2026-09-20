<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueStateSpan */
class IssueStateSpan extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $stateId,
		#[LinearDate]
		public Optional|CarbonImmutable $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $endedAt,
		public Optional|WorkflowState|null $state
	) {
	}
}
