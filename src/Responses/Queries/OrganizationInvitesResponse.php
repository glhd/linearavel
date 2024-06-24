<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationInviteConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationInvitesResponse extends LinearResponse
{
	public function resolve(): OrganizationInviteConnection
	{
		return OrganizationInviteConnection::from($this->json('data.organizationInvites'));
	}
}
