<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\GitAutomationStates;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitAutomationState */
class GitAutomationState extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|Team $team,
		public Optional|GitAutomationStates $event,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|WorkflowState|null $state,
		public Optional|GitAutomationTargetBranch|null $targetBranch,
		public Optional|string|null $branchPattern
	) {
	}
}
