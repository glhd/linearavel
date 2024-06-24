<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationInvitePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationInviteCreateResponse extends LinearResponse
{
	public function resolve(): OrganizationInvitePayload
	{
		return OrganizationInvitePayload::from($this->json('data.organizationInviteCreate'));
	}
}
