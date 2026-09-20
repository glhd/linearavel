<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Dashboard */
class Dashboard extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $slugId,
		public Optional|string $name,
		public Optional|float $sortOrder,
		public Optional|bool $shared,
		public Optional|Organization $organization,
		public Optional|string $widgets,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		public Optional|User|null $creator,
		public Optional|User|null $updatedBy,
		public Optional|User|null $owner,
		public Optional|string|null $issueFilter,
		public Optional|string|null $projectFilter
	) {
	}
}
