<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomView extends Data implements Node
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
		public Optional|string|null $description = null,
		public Optional|string|null $icon = null,
		public Optional|string|null $color = null,
		public Optional|Organization $organization,
		public Optional|Team|null $team = null,
		public Optional|User $creator,
		public Optional|User $owner,
		public Optional|User $updatedBy,
		public Optional|string $filters,
		public Optional|string $filterData,
		public Optional|string|null $projectFilterData = null,
		public Optional|bool $shared,
		public Optional|string $modelName,
		public Optional|IssueConnection $issues
	) {
	}
}
