<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\PartnerProgramPartnerPayload;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class PartnerProgramPartnersQueryResponse extends LinearResponse
{
	/** @returns Collection<int, PartnerProgramPartnerPayload> */
	public function resolve(): Collection
	{
		return PartnerProgramPartnerPayload::collect($this->json('data.partnerProgramPartners'), Collection::class);
	}
}
