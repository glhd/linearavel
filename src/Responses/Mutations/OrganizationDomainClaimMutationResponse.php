<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationDomainSimplePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationDomainClaimMutationResponse extends LinearResponse
{
	public function resolve(): OrganizationDomainSimplePayload
	{
		return OrganizationDomainSimplePayload::from($this->json('data.organizationDomainClaim'));
	}
}
