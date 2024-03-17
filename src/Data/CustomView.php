<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomView extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|Organization $organization,
		public Optional|User $creator,
		public Optional|User $owner,
		public Optional|User $updatedBy,
		public Optional|string $filters,
		public Optional|string $filterData,
		public Optional|bool $shared,
		public Optional|string $modelName,
		public Optional|IssueConnection $issues,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		public Optional|Team|null $team,
		public Optional|string|null $projectFilterData
	) {
	}
}
