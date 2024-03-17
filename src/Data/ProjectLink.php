<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectLink extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $url,
		public Optional|string $label,
		public Optional|float $sortOrder,
		public Optional|User $creator,
		public Optional|Project $project,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt
	) {
	}
}
