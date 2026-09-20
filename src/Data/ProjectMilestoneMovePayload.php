<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectMilestoneMovePayload */
class ProjectMilestoneMovePayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		public Optional|ProjectMilestone $projectMilestone,
		public Optional|bool $success,
		/** @var Collection<int, ProjectMilestoneMoveIssueToTeam> */
		public Optional|Collection|null $previousIssueTeamIds,
		public Optional|ProjectMilestoneMoveProjectTeams|null $previousProjectTeamIds
	) {
	}
}
