<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Organization;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationQueryResponse extends LinearResponse
{
	public function resolve(): Organization
	{
		return Organization::from($this->json('data.organization'));
	}
}
