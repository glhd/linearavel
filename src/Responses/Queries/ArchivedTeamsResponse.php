<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class ArchivedTeamsResponse extends LinearResponse
{
	/** @returns Collection<int, Team> */
	public function resolve(): Collection
	{
		return Team::collect($this->json('data.archivedTeams'), Collection::class);
	}
}
