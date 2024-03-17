<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueDraft extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string $title,
		public Optional|string|null $description = null,
		public Optional|float $priority,
		public Optional|float|null $estimate = null,
		public Optional|string|null $dueDate = null,
		public Optional|string $teamId,
		public Optional|string|null $cycleId = null,
		public Optional|string|null $projectId = null,
		public Optional|string|null $projectMilestoneId = null,
		public Optional|User $creator,
		public Optional|string|null $assigneeId = null,
		public Optional|string $stateId,
		public Optional|IssueDraft|null $parent = null,
		public Optional|Issue|null $parentIssue = null,
		public Optional|float|null $subIssueSortOrder = null,
		public Optional|string $priorityLabel,
		public Optional|string|null $descriptionData = null,
		public Optional|string $attachments
	) {
	}
}
