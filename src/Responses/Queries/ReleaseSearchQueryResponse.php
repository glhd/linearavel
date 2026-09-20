<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Release;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class ReleaseSearchQueryResponse extends LinearResponse
{
	/** @returns Collection<int, Release> */
	public function resolve(): Collection
	{
		return Release::collect($this->json('data.releaseSearch'), Collection::class);
	}
}
