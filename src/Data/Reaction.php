<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Reaction extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $emoji,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Issue|null $issue,
		public Optional|Comment|null $comment,
		public Optional|ProjectUpdate|null $projectUpdate,
		public Optional|User|null $user
	) {
	}
}
