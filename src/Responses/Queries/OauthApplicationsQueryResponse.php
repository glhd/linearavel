<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OAuthApplication;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class OauthApplicationsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, OAuthApplication> */
	public function resolve(): Collection
	{
		return OAuthApplication::collect($this->json('data.oauthApplications'), Collection::class);
	}
}
