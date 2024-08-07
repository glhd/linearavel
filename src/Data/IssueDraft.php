<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueDraft */
class IssueDraft extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $title,
		public Optional|float $priority,
		public Optional|string $teamId,
		public Optional|User $creator,
		public Optional|string $stateId,
		public Optional|string $priorityLabel,
		public Optional|string $attachments,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|float|null $estimate,
		public Optional|string|null $dueDate,
		public Optional|string|null $cycleId,
		public Optional|string|null $projectId,
		public Optional|string|null $projectMilestoneId,
		public Optional|string|null $assigneeId,
		public Optional|IssueDraft|null $parent,
		public Optional|Issue|null $parentIssue,
		public Optional|float|null $subIssueSortOrder,
		public Optional|string|null $descriptionData
	) {
	}
}
