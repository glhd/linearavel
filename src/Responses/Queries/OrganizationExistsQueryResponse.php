<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationExistsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationExistsQueryResponse extends LinearResponse
{
	public function resolve(): OrganizationExistsPayload
	{
		return OrganizationExistsPayload::from($this->json('data.organizationExists'));
	}
}
