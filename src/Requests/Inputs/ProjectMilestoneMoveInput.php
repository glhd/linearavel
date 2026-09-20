<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectMilestoneMoveInput */
class ProjectMilestoneMoveInput
{
	public function __construct(
		public string $projectId,
		public ?string $newIssueTeamId = null,
		public ?bool $addIssueTeamToProject = null,
		/** @var iterable<ProjectMilestoneMoveIssueToTeamInput>|Collection<int, ProjectMilestoneMoveIssueToTeamInput> */
		public ?iterable $undoIssueTeamIds = null,
		public ?ProjectMilestoneMoveProjectTeamsInput $undoProjectTeamIds = null
	) {
	}
}
