<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ProjectTab;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Favorite extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|User $owner,
		public Optional|float $sortOrder,
		public Optional|FavoriteConnection $children,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Favorite|null $parent,
		public Optional|string|null $folderName,
		public Optional|ProjectTab|null $projectTab,
		public Optional|string|null $predefinedViewType,
		public Optional|Issue|null $issue,
		public Optional|Project|null $project,
		public Optional|Team|null $projectTeam,
		public Optional|Cycle|null $cycle,
		public Optional|CustomView|null $customView,
		public Optional|Team|null $predefinedViewTeam,
		public Optional|Document|null $document,
		public Optional|Roadmap|null $roadmap,
		public Optional|IssueLabel|null $label,
		public Optional|User|null $user
	) {
	}
}
