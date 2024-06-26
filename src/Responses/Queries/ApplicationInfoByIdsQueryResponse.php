<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Application;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class ApplicationInfoByIdsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, Application> */
	public function resolve(): Collection
	{
		return Application::collect($this->json('data.applicationInfoByIds'), Collection::class);
	}
}
