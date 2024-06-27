<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ContextViewType;
use Glhd\Linearavel\Data\Enums\UserContextViewType;
use Glhd\Linearavel\Data\Enums\WorkflowTrigger;
use Glhd\Linearavel\Data\Enums\WorkflowTriggerType;
use Glhd\Linearavel\Data\Enums\WorkflowType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/WorkflowDefinition */
class WorkflowDefinition extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|WorkflowType $type,
		public Optional|WorkflowTrigger $trigger,
		public Optional|WorkflowTriggerType $triggerType,
		public Optional|string $conditions,
		public Optional|bool $enabled,
		public Optional|User $creator,
		public Optional|string $activities,
		public Optional|string $sortOrder,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $groupName,
		public Optional|string|null $description,
		public Optional|Team|null $team,
		public Optional|IssueLabel|null $label,
		public Optional|Cycle|null $cycle,
		public Optional|User|null $user,
		public Optional|Project|null $project,
		public Optional|CustomView|null $customView,
		public Optional|ContextViewType|null $contextViewType,
		public Optional|UserContextViewType|null $userContextViewType
	) {
	}
}
