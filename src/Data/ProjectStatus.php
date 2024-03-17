<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ProjectStatusType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectStatus extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $color,
		public Optional|float $position,
		public Optional|bool $indefinite,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|ProjectStatusType|null $type
	) {
	}
}
