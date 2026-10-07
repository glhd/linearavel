<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OriginInstallationDetails;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class OriginPendingInstallationsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, OriginInstallationDetails> */
	public function resolve(): Collection
	{
		return OriginInstallationDetails::collect($this->json('data.originPendingInstallations'), Collection::class);
	}
}
