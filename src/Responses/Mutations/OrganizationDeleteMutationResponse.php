<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationDeletePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationDeleteMutationResponse extends LinearResponse
{
	public function resolve(): OrganizationDeletePayload
	{
		return OrganizationDeletePayload::from($this->json('data.organizationDelete'));
	}
}
