<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\PartnerOfferRedeemPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class PartnerOfferRedeemMutationResponse extends LinearResponse
{
	public function resolve(): PartnerOfferRedeemPayload
	{
		return PartnerOfferRedeemPayload::from($this->json('data.partnerOfferRedeem'));
	}
}
