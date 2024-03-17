<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Roadmap extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|Organization $organization,
		public Optional|User $creator,
		public Optional|User $owner,
		public Optional|string $slugId,
		public Optional|float $sortOrder,
		public Optional|ProjectConnection $projects,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $color
	) {
	}
}
