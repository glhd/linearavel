<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EmailIntakeAddress extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $address,
		public Optional|bool $enabled,
		public Optional|Team $team,
		public Optional|Organization $organization,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Template|null $template,
		public Optional|User|null $creator
	) {
	}
}
