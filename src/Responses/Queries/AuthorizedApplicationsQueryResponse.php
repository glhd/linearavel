<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AuthorizedApplication;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class AuthorizedApplicationsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, AuthorizedApplication> */
	public function resolve(): Collection
	{
		return AuthorizedApplication::collect($this->json('data.authorizedApplications'), Collection::class);
	}
}
