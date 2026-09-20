<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AccessKeyRelease;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class RecentReleasesByAccessKeyQueryResponse extends LinearResponse
{
	/** @returns Collection<int, AccessKeyRelease> */
	public function resolve(): Collection
	{
		return AccessKeyRelease::collect($this->json('data.recentReleasesByAccessKey'), Collection::class);
	}
}
