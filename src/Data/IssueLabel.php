<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueLabel */
class IssueLabel extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $color,
		public Optional|Organization $organization,
		public Optional|bool $isGroup,
		public Optional|IssueConnection $issues,
		public Optional|IssueLabelConnection $children,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|Team|null $team,
		public Optional|User|null $creator,
		public Optional|IssueLabel|null $parent
	) {
	}
}
