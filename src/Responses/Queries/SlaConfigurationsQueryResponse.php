<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\SlaConfiguration;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class SlaConfigurationsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, SlaConfiguration> */
	public function resolve(): Collection
	{
		return SlaConfiguration::collect($this->json('data.slaConfigurations'), Collection::class);
	}
}
