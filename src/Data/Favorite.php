<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ProjectTab;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Favorite extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string $type,
		public Optional|Favorite|null $parent = null,
		public Optional|string|null $folderName = null,
		public Optional|ProjectTab|null $projectTab = null,
		public Optional|string|null $predefinedViewType = null,
		public Optional|User $owner,
		public Optional|float $sortOrder,
		public Optional|FavoriteConnection $children,
		public Optional|Issue|null $issue = null,
		public Optional|Project|null $project = null,
		public Optional|Team|null $projectTeam = null,
		public Optional|Cycle|null $cycle = null,
		public Optional|CustomView|null $customView = null,
		public Optional|Team|null $predefinedViewTeam = null,
		public Optional|Document|null $document = null,
		public Optional|Roadmap|null $roadmap = null,
		public Optional|IssueLabel|null $label = null,
		public Optional|User|null $user = null
	) {
	}
}
