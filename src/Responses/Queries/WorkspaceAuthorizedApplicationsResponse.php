<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\WorkspaceAuthorizedApplication;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class WorkspaceAuthorizedApplicationsResponse extends LinearResponse
{
	/** @returns Collection<int, WorkspaceAuthorizedApplication> */
	public function resolve(): Collection
	{
		return WorkspaceAuthorizedApplication::collect($this->json('data.workspaceAuthorizedApplications'), Collection::class);
	}
}
