<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationInvite;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationInviteResponse extends LinearResponse
{
	public function resolve(): OrganizationInvite
	{
		return OrganizationInvite::from($this->json('data.organizationInvite'));
	}
}
