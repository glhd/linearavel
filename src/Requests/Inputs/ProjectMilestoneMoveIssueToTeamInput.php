<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectMilestoneMoveIssueToTeamInput */
class ProjectMilestoneMoveIssueToTeamInput
{
	public function __construct(public string $issueId, public string $teamId)
	{
	}
}
