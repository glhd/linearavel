<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectMilestoneMoveProjectTeamsInput */
class ProjectMilestoneMoveProjectTeamsInput
{
	public function __construct(
		public string $projectId,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $teamIds
	) {
	}
}
