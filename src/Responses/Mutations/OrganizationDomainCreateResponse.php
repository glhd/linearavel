<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationDomainPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationDomainCreateResponse extends LinearResponse
{
	public function resolve(): OrganizationDomainPayload
	{
		return OrganizationDomainPayload::from($this->json('data.organizationDomainCreate'));
	}
}
