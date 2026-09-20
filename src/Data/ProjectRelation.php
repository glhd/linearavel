<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectRelation */
class ProjectRelation extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|Project $project,
		public Optional|string $anchorType,
		public Optional|Project $relatedProject,
		public Optional|string $relatedAnchorType,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|ProjectMilestone|null $projectMilestone,
		public Optional|ProjectMilestone|null $relatedProjectMilestone,
		public Optional|User|null $user
	) {
	}
}
