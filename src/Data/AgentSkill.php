<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSkill */
class AgentSkill extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|User $owner,
		public Optional|User $creator,
		public Optional|bool $shared,
		public Optional|string $body,
		public Optional|string $title,
		public Optional|string $slugId,
		public Optional|float $recentUsageCount,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $teamId,
		public Optional|AgentSkill|null $inheritedFrom,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		public Optional|User|null $lastUpdatedBy,
		#[LinearDate]
		public Optional|CarbonImmutable|null $lastUsedAt
	) {
	}
}
