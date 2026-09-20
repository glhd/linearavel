<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/LoopExecution */
class LoopExecution extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|AiConversation $aiConversation,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|WorkflowDefinition|null $workflowDefinition,
		public Optional|Issue|null $issue,
		public Optional|Project|null $project,
		public Optional|Initiative|null $initiative,
		public Optional|Document|null $document,
		public Optional|Team|null $team,
		public Optional|Cycle|null $cycle,
		public Optional|Release|null $release
	) {
	}
}
