<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ContextViewType;
use Glhd\Linearavel\Data\Enums\UserContextViewType;
use Glhd\Linearavel\Data\Enums\WorkflowTrigger;
use Glhd\Linearavel\Data\Enums\WorkflowTriggerType;
use Glhd\Linearavel\Data\Enums\WorkflowType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowDefinition extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string $name,
		public Optional|string|null $groupName = null,
		public Optional|string|null $description = null,
		public Optional|WorkflowType $type,
		public Optional|WorkflowTrigger $trigger,
		public Optional|WorkflowTriggerType $triggerType,
		public Optional|string $conditions,
		public Optional|bool $enabled,
		public Optional|Team|null $team = null,
		public Optional|User $creator,
		public Optional|string $activities,
		public Optional|string $sortOrder,
		public Optional|IssueLabel|null $label = null,
		public Optional|Cycle|null $cycle = null,
		public Optional|User|null $user = null,
		public Optional|Project|null $project = null,
		public Optional|CustomView|null $customView = null,
		public Optional|ContextViewType|null $contextViewType = null,
		public Optional|UserContextViewType|null $userContextViewType = null
	) {
	}
}
