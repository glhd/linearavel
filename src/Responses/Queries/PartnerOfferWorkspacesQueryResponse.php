<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\PartnerOfferWorkspacesPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class PartnerOfferWorkspacesQueryResponse extends LinearResponse
{
	public function resolve(): ?PartnerOfferWorkspacesPayload
	{
		$data = $this->json('data.partnerOfferWorkspaces');
		
		return null === $data ? null : PartnerOfferWorkspacesPayload::from($data);
	}
}
