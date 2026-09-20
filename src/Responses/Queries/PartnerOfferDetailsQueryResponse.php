<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\PartnerOfferDetailsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class PartnerOfferDetailsQueryResponse extends LinearResponse
{
	public function resolve(): ?PartnerOfferDetailsPayload
	{
		$data = $this->json('data.partnerOfferDetails');
		
		return null === $data ? null : PartnerOfferDetailsPayload::from($data);
	}
}
