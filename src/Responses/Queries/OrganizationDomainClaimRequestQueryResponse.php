<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationDomainClaimPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationDomainClaimRequestQueryResponse extends LinearResponse
{
	public function resolve(): OrganizationDomainClaimPayload
	{
		return OrganizationDomainClaimPayload::from($this->json('data.organizationDomainClaimRequest'));
	}
}
