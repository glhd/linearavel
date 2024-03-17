<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamMembership extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|User $user,
		public Optional|Team $team,
		public Optional|float $sortOrder,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|bool|null $owner
	) {
	}
}
