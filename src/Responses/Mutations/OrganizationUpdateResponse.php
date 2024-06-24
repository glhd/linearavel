<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationUpdateResponse extends LinearResponse
{
	public function resolve(): OrganizationPayload
	{
		return OrganizationPayload::from($this->json('data.organizationUpdate'));
	}
}
