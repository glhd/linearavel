<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ArchivedIntegrationPayload;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class ArchivedIntegrationsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, ArchivedIntegrationPayload> */
	public function resolve(): Collection
	{
		return ArchivedIntegrationPayload::collect($this->json('data.archivedIntegrations'), Collection::class);
	}
}
