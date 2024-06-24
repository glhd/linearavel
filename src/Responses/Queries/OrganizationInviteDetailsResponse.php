<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationInviteDetailsResponse extends LinearResponse
{
	public function resolve(): OrganizationInviteDetailsPayload
	{
		return OrganizationInviteDetailsPayload::from($this->json('data.organizationInviteDetails'));
	}
}
