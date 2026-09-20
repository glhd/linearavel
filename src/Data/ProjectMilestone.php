<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ProjectMilestoneStatus;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectMilestone */
class ProjectMilestone extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|Project $project,
		public Optional|string $progressHistory,
		public Optional|string $currentProgress,
		public Optional|float $sortOrder,
		public Optional|ProjectMilestoneStatus $status,
		public Optional|float $progress,
		public Optional|IssueConnection $issues,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|DocumentContent|null $documentContent,
		public Optional|string|null $targetDate,
		public Optional|string|null $description,
		public Optional|string|null $descriptionState
	) {
	}
}
