<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Template extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|string $name,
		public Optional|string $templateData,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|Organization|null $organization,
		public Optional|Team|null $team,
		public Optional|User|null $creator,
		public Optional|User|null $lastUpdatedBy
	) {
	}
}
